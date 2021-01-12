<?php

namespace App\Support;

use Illuminate\Support\Facades\Session;

class Deezer extends ApiStandard
{
    const     APP_ID                = '';
    const     APP_SECRET            = '';
    const     APP_CALL_BACK_URL     = 'http://localhost/deezer-api-project/public/deez-callback';

    const     APP_PERMISSIONS       = 'basic_access,email';

    //
    public    $csrf;
    //
    protected $code;
    //
    protected $token;
    protected $tokenExpirationTime;
    protected $tokenVerificationTime;
    protected $tokenDestroyTime;
    //

    function __construct()
    {
        $baseUrl          =     'https://api.deezer.com/';
        $sslStatus        =     true;
        parent::__construct($baseUrl, $sslStatus);
        //
        $this->connectUrl =     'https://connect.deezer.com/';
        //
        if(Session::has('app'))
        {
            $this->loadAppDeezer();
        }
    }

    private function loadAppDeezer()
    {
        $appInfo = Session::get('app');
        foreach($appInfo as $parameter => $value)
        {
            $this->$parameter = $value;
        }
    }

    private function setCSRF()
    {
        $this->csrf = csrf_token();
        Session::put('state', $this->csrf);
    }

    public function authUser()
    {
        $this->setCSRF();

        $parameters = [ 'app_id'        => $this::APP_ID,
                        'redirect_uri'  => $this::APP_CALL_BACK_URL,
                        'perms'         => $this::APP_PERMISSIONS,
                        'state'         => $this->csrf,
                        'output'        => 'json'
                    ];
        $request    = new ApiUrn('oauth', 'auth.php', '', $parameters);
        $requestUrl = "{$this->connectUrl}{$request->getUrn()}";

        return redirect($requestUrl);
    }

    public function authTreatment()
    {
        if( (isset($_REQUEST['state']) && !empty($_REQUEST['state'])) &&
            ($_REQUEST['state'] === Session::get('state')) )
        {
            if(isset($_REQUEST['error_reason']) && !empty($_REQUEST['error_reason']))
            {
                $errorReason = $_REQUEST['error_reason'];
                return redirect('front.home')->with('error', $errorReason);
            }

            if(isset($_REQUEST['code']) && !empty($_REQUEST['code']))
            {
                $this->code = $_REQUEST['code'];
                $this->save();
                $this->generateAccessToken();

                $urlDestino = route('front.home');

                echo "<script>
                            window.onunload = refreshParent;
                            function refreshParent()
                            {
                                window.opener.location.href = '{$urlDestino}';
                            }

                            window.close();
                      </script>";
            }
        }
        else
        {
            return redirect()->route('front.home')->with('error', 'CSRF inválido.');
        }
    }

    public function generateAccessToken()
    {

        $this->setCSRF();
        //
        $parameters = [ 'app_id'        => $this::APP_ID,
                        'secret'        => $this::APP_SECRET,
                        'code'          => $this->code,
                        'state'         => $this->csrf,
                        'output'        => 'json'
                    ];
        $request    = new ApiUrn('oauth', 'access_token.php', '', $parameters);
        $requestUrl = "{$this->connectUrl}{$request->getUrn()}";

        $reponse    = json_decode(file_get_contents($requestUrl));
        if(isset($reponse) && !empty($reponse))
        {
            $this->token                    = $reponse->access_token;
            $this->tokenExpirationTime      = $reponse->expires;
            $this->tokenVerificationTime    = date('Y-m-d H:i:s');
            $this->tokenDestroyTime         = date('Y-m-d H:i:s', strtotime('+{$this->tokenExpirationTime} sec', strtotime($this->tokenVerificationTime)));
            //
            $user = new User('me');
            Session::put('user', $user);
            //
            $this->save();
        }
        else
        {
            return redirect()->route('front.home')->with('error', 'Código inválido.');
        }
    }

    private function save()
    {
        Session::put('app', $this);
    }
}
