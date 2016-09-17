<?php

class Registry_PersonalWebLinks
{
    private static $PERSONAL_WEB_LINKS = array(

        'email' => array(
            'glyph'    => 'fa-envelope',
            'display'  => 'Email',
            'url'      => 'mailto:jeff@mariten.com',
        ),

        'linkedin' => array(
            'glyph'    => 'fa-linkedin',
            'display'  => 'LinkedIn',
            'url'      => 'https://www.linkedin.com/pub/jeff-case/12/4b4/847',
        ),

        'github' => array(
            'glyph'    => 'fa-github',
            'display'  => 'GitHub',
            'url'      => 'https://github.com/mariten',
        ),

        'flickr' => array(
            'glyph'    => 'fa-flickr',
            'display'  => 'Flickr',
            'url'      => 'https://www.flickr.com/photos/mariten/',
        ),

        'stack_overflow' => array(
            'glyph'    => 'fa-stack-overflow',
            'display'  => 'Stack Overflow',
            'url'      => 'http://stackoverflow.com/users/1287905/manmaru',
        ),

        'stack_travel' => array(
            'glyph'    => 'fa-stack-exchange',
            'display'  => 'Stack Travel',
            'url'      => 'http://travel.stackexchange.com/users/12066/manmaru',
        ),
    );


    //{{{ get()
    public static function get()
    {
        return self::$PERSONAL_WEB_LINKS;
    }
    //}}}
}
