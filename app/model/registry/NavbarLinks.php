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
                    'display'   => 'Samples: Olden Japan',
                ),
                array(
                    'path'      => '/photography/samples/modern-japan',
                    'display'   => 'Samples: Modern Japan',
                ),
                array(
                    'path'      => '/photography/samples/natural-japan',
                    'display'   => 'Samples: Natural Japan',
                ),
                array(
                    'path'      => '/photography/samples/japan-at-night',
                    'display'   => 'Samples: Japan at Night',
                ),
                array(
                    'path'      => '/photography/samples/food-in-japan',
                    'display'   => 'Samples: Food in Japan',
                ),
                array(
                    'path'      => '/photography/samples/animals-in-japan',
                    'display'   => 'Samples: Animals in Japan',
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
