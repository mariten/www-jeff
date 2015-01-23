<?php
class Registry_FlickrMariten
{
    const USER_ID      = '37073542@N08';
    const BASE_URL     = 'https://www.flickr.com/photos/mariten/';
    const MAP_URL      = 'http://loc.alize.us/#/flickr:';


    //{{{ ALBUMS
    private static $ALBUMS = array(

        'olden_japan' => array(
            'id'        => '72157622463604941',
            'display'   => 'Olden Japan',
        ),

        'modern_japan' => array(
            'id'        => '72157622588053932',
            'display'   => 'Modern Japan',
        ),

        'natural_japan' => array(
            'id'        => '72157622463615233',
            'display'   => 'Natural Japan',
        ),
    );
    //}}}
    //{{{ getAlbums()
    public static function getAlbums()
    {
        return self::$ALBUMS;
    }
    //}}}
}
