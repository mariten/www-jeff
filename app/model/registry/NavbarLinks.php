<?php

class Registry_NavbarLinks
{
    private static $NAVBAR_LINKS = array(
        array(
            'path'      => '/',
            'display'   => 'About Me',
        ),
        array(
            'path'      => '/development',
            'display'   => 'Development',
        ),
        array(
            'path'      => '/photography',
            'display'   => 'Photography',
        ),
        array(
            'path'      => '/translation',
            'display'   => 'Translation',
        ),
        array(
            'path'      => '/contact',
            'display'   => 'Get in Touch',
        ),
    );


    //{{{ get()
    public static function get()
    {
        return self::$NAVBAR_LINKS;
    }
    //}}}
}
