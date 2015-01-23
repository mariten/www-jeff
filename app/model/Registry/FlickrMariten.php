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


    //{{{ PREFECTURE_LOOKUP
    private static $PREFECTURE_LOOKUP = array(
        '北海道'   => 'Hokkaido',
        '青森県'   => 'Aomori',
        '岩手県'   => 'Iwate',
        '宮城県'   => 'Miyagi',
        '秋田県'   => 'Akita',
        '山形県'   => 'Yamagata',
        '福島県'   => 'Fukushima',
        '茨城県'   => 'Ibaraki',
        '栃木県'   => 'Tochigi',
        '群馬県'   => 'Gunma',
        '埼玉県'   => 'Saitama',
        '千葉県'   => 'Chiba',
        '東京都'   => 'Tokyo',
        '神奈川県' => 'Kanagawa',
        '山梨県'   => 'Yamanashi',
        '長野県'   => 'Nagano',
        '新潟県'   => 'Niigata',
        '富山県'   => 'Toyama',
        '石川県'   => 'Ishikawa',
        '福井県'   => 'Fukui',
        '岐阜県'   => 'Gifu',
        '静岡県'   => 'Shizuoka',
        '愛知県'   => 'Aichi',
        '三重県'   => 'Mie',
        '滋賀県'   => 'Shiga',
        '京都府'   => 'Kyoto',
        '大阪府'   => 'Osaka',
        '兵庫県'   => 'Hyogo',
        '奈良県'   => 'Nara',
        '和歌山県' => 'Wakayama',
        '鳥取県'   => 'Tottori',
        '島根県'   => 'Shimane',
        '岡山県'   => 'Okayama',
        '広島県'   => 'Hiroshima',
        '山口県'   => 'Yamaguchi',
        '徳島県'   => 'Tokushima',
        '香川県'   => 'Kagawa',
        '愛媛県'   => 'Ehime',
        '高知県'   => 'Kochi',
        '福岡県'   => 'Fukuoka',
        '佐賀県'   => 'Saga',
        '長崎県'   => 'Nagasaki',
        '熊本県'   => 'Kumamoto',
        '大分県'   => 'Oita',
        '宮崎県'   => 'Miyazaki',
        '鹿児島県' => 'Kagoshima',
        '沖縄県'   => 'Okinawa',
    );
    //}}}
    //{{{ isPrefectureTag(string)
    public static function isPrefectureTag($tag)
    {
        return isset(self::$PREFECTURE_LOOKUP[$tag]);
    }
    //}}}
    //{{{ getPrefectureDisplay(string)
    public static function getPrefectureDisplay($tag)
    {
        if(isset(self::$PREFECTURE_LOOKUP[$tag])) {
            return self::$PREFECTURE_LOOKUP[$tag];
        } else {
            return '';
        }
    }
    //}}}


    //{{{ removeTitlePrefix(string)
    /**
      * I prefix all photos with the sequential number of the photo (based on its camera)
      * There is always a space between this number and the actual photo title
      * For display on website, it is cleaner without this prefix
      *
      * @param  string   Flickr photo title from Mariten's collection
      * @return string   Photo title with prefix removed
      */
    public static function removeTitlePrefix($photo_title)
    {
        $first_space = mb_strpos($photo_title, ' ');
        if($first_space !== false) {
            return mb_substr($photo_title, $first_space + 1);
        } else {
            return $photo_title;
        }
    }
    //}}}
}
