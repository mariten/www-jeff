<?php

class Registry_PersonalWebLinks
{
    // Web link URL constants
    const JEFF_URL_LINKEDIN        = 'https://www.linkedin.com/pub/jeff-case/12/4b4/847';
    const JEFF_URL_GITHUB          = 'https://github.com/mariten';
    const JEFF_URL_FLICKR          = 'https://www.flickr.com/photos/mariten/';
    const JEFF_URL_STACK_OVERFLOW  = 'http://stackoverflow.com/users/1287905/manmaru';
    const JEFF_URL_STACK_TRAVEL    = 'http://travel.stackexchange.com/users/12066/manmaru';

    //{{{ getAsArray()
    public static function getAsArray()
    {
        return array(

            'linkedin' => array(
                'glyph'    => 'fa-linkedin',
                'display'  => 'LinkedIn',
                'url'      => self::JEFF_URL_LINKEDIN,
            ),

            'github' => array(
                'glyph'    => 'fa-github',
                'display'  => 'GitHub',
                'url'      => self::JEFF_URL_GITHUB,
            ),

            'flickr' => array(
                'glyph'    => 'fa-flickr',
                'display'  => 'Flickr',
                'url'      => self::JEFF_URL_FLICKR,
            ),

            'stack_overflow' => array(
                'glyph'    => 'fa-stack-overflow',
                'display'  => 'Stack Overflow',
                'url'      => self::JEFF_URL_STACK_OVERFLOW,
            ),

            'stack_travel' => array(
                'glyph'    => 'fa-stack-exchange',
                'display'  => 'Stack Travel',
                'url'      => self::JEFF_URL_STACK_TRAVEL,
            ),
        );
    }
    //}}}
}
