<?php
    use Illuminate\Support\Facades\Session;
    use app\Support\ApiUrn;

    $musicPlayerType = '';
    $musicPlayerId   = '';
    $musicPlayerAuto = 'false';
    $musicPlayerOpenned = false;

    if(Session::has('app'))
    {
        $app = Session::get('app');
        if(isset($app->track) && !empty($app->track))
        {
            $musicPlayerType    = $app->track->type;
            $musicPlayerId      = $app->track->id;
            $musicPlayerAuto    = true;
            $musicPlayerOpenned = true;
        }
    }

    $parameters     = [ 'type'      => $musicPlayerType,
                        'id'        => $musicPlayerId,
                        'autoplay'  => $musicPlayerAuto,
                        'format'    => 'classic',
                        'color'     => 'ef5466',
                        'playlist'  => 'true',
                        'width'     => '300',
                        'height'    => '62'
                    ];

    $uri            = 'https://www.deezer.com/';
    $request            = new ApiUrn('plugins', 'player', '', $parameters);

    $url            = "{$uri}{$request->getUrn()}";
?>
@if($musicPlayerOpenned)
    <iframe
        id='dzplayer'
        dztype='dzplayer'
        src='{{ $url }}'
        scrolling='no'
        frameborder='0'
        style='border:none; overflow:hidden; height: 62px;'
        width='100%'
        height='100'
        allowTransparency='true'>
    </iframe>
@endif
