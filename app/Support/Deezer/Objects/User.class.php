<?php

namespace app\Support;

use PhpParser\Node\Expr\Cast\String_;
use Ramsey\Uuid\Type\Integer;

class User extends DeezerObject
{
    const OBJECT_SERVICE = 'user';

    protected $id;

    function __construct($id = 0)
    {
        parent::__construct();

        if(isset($id) && !empty($id))
        {
            $this->setId($id);
            $this->get();
        }
    }

    function getPermissions()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'permissions');
        $userPermissions = $this->communicate('', 'GET', $request);

        return $userPermissions;
    }

    function getFlow()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'flow');
        $userFlow = $this->communicate('', 'GET', $request);

        return $userFlow;
    }

    function getPlaylists()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'playlists');
        $userPlaylist = $this->communicate('', 'GET', $request);

        return $userPlaylist;
    }

    function getAlbums()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'albums');
        $userAlbums = $this->communicate('', 'GET', $request);

        return $userAlbums;
    }

    function getArtists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'artists', $parameters);
        $userArtists = $this->communicate('', 'GET', $request);

        return $userArtists;
    }

    function getCharts()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'charts');
        $userCharts = $this->communicate('', 'GET', $request);

        return $userCharts;
    }

    function getFolders()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'folders');
        $userFolders = $this->communicate('', 'GET', $request);

        return $userFolders;
    }

    function getFollowings()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'followings');
        $userFollowings = $this->communicate('', 'GET', $request);

        return $userFollowings;
    }

    function getFollowers()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'followers');
        $userFollowers = $this->communicate('', 'GET', $request);

        return $userFollowers;
    }

    function getHistory(Int $limit = 10)
    {
        $parameters = ['limit' => $limit];

        if(isset($this->token) && !empty($this->token))
        {
            $parameters['access_token'] = $this->token;
        }

        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'history', $parameters);
        $userHistory = $this->communicate('', 'GET', $request);

        return $userHistory;
    }

    function getNotifications()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'notifications');
        $userNotifications = $this->communicate('', 'GET', $request);

        return $userNotifications;
    }

    function getOptions()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'options');
        $userOptions = $this->communicate('', 'GET', $request);

        return $userOptions;
    }

    function getPersonalSongs()
    {
        $parameters = [];

        if(isset($this->token) && !empty($this->token))
        {
            $parameters['access_token'] = $this->token;
        }

        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'personal_songs', $parameters);
        $userPersonalSongs = $this->communicate('', 'GET', $request);

        return $userPersonalSongs;
    }

    function getPodcasts(Int $limit = 10)
    {
        $parameters = ['limit' => $limit];

        if(isset($this->token) && !empty($this->token))
        {
            $parameters['access_token'] = $this->token;
        }

        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'podcasts');
        $userPodcasts = $this->communicate('', 'GET', $request);

        return $userPodcasts;
    }

    function getRadios()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'radios');
        $userRadios = $this->communicate('', 'GET', $request);

        return $userRadios;
    }

    function getRecommendations(String $type, Int $limit = 10)
    {
        /**
         * @var type (albums, artists, playlists, tracks, radios)
         */
        $parameters = ['limit' => $limit];

        if(isset($this->token) && !empty($this->token))
        {
            $parameters['access_token'] = $this->token;
        }

        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, "recommendations/{$type}", $parameters);
        $userRecommendations = $this->communicate('', 'GET', $request);

        return $userRecommendations;
    }

    function getTracks()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'tracks');
        $userTracks = $this->communicate('', 'GET', $request);

        return $userTracks;
    }

}
