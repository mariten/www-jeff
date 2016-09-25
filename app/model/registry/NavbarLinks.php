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
            'sub_menu'  => array(
                array(
                    'path'      => '/photography/samples/olden-japan',
                    'display'   => 'Olden Japan',
                ),
                array(
                    'path'      => '/photography/samples/modern-japan',
                    'display'   => 'Modern Japan',
                ),
                array(
                    'path'      => '/photography/samples/natural-japan',
                    'display'   => 'Natural Japan',
                ),
                array(
                    'path'      => '/photography/samples/japan-at-night',
                    'display'   => 'Japan at Night',
                ),
                array(
                    'path'      => '/photography/samples/food-in-japan',
                    'display'   => 'Food in Japan',
                ),
                array(
                    'path'      => '/photography/samples/animals-in-japan',
                    'display'   => 'Animals in Japan',
                ),
            ),
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
