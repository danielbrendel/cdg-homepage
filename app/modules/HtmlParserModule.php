<?php

/**
 * Class HtmlParserModule
 */
class HtmlParserModule
{
    /**
     * Get image tags from code
     * 
     * @param $code
     * @return array
     */
    public static function getImageTags($code)
    {
        $result = array();
        
        $inImgTag = false;
        $curCode = '';
        
        for ($i = 0; $i < strlen($code); $i++) {
            if (!$inImgTag) {
                if (substr($code, $i, 4) === '<img') {
                    $inImgTag = true;
                }
            }
            
            if ($inImgTag) {
                $curCode .= substr($code, $i, 1);
                
                if (substr($code, $i, 1) === '>') {
                    $result[] = $curCode;
                    $curCode = '';
                    $inImgTag = false;
                }
            }
        }
        
        return $result;
    }

    /**
     * Query tag attribute
     * 
     * @param $code
     * @param $attribute
     * @return string 
     */
    public static function queryTagAttribute($code, $attribute)
    {
        $pos = strpos($code, $attribute . '="');
        
        if ($pos !== false) {
            $pos += strlen($attribute . '="');
            
            $curCode = '';
            
            for ($i = $pos; $i < strlen($code); $i++) {
                if (substr($code, $i, 1) === '"') {
                    break;
                }
                
                $curCode .= substr($code, $i, 1);
            }
            
            return $curCode;
        }
        
        return '';
    }

    /**
     * Extract SteamID from image feed content
     * 
     * @param $code
     * @return mixed
     */
    public static function extractSteamId($code)
    {
        $cardAuthorName = '<div class="apphub_CardContentAuthorName';
        $pos = strpos($code, $cardAuthorName);
        
        if ($pos !== false) {
            $inner = '';

            for ($i = $pos + strlen($cardAuthorName); $i < strlen($code); $i++) {
                if (substr($code, $i, 6) === '</div>') {
                    break;
                }

                $inner .= substr($code, $i, 1);
            }
            
            $anchor = strpos($inner, '<a');
            if ($anchor !== false) {
                $ainner = '';

                for ($i = $anchor; $i < strlen($inner); $i++) {
                    if (substr($inner, $i, 1) === '>') {
                        break;
                    }

                    $ainner .= substr($inner, $i, 1);
                }
                
                $steamId = static::queryTagAttribute($ainner, 'href');
                $custom = null;

                if (strpos($steamId, '/profiles/') !== false) {
                    $steamId = substr($steamId, strpos($steamId, '/profiles/') + 10, -1);
                    $custom = false;
                } else if (strpos($steamId, '/id/') !== false) {
                    $steamId = substr($steamId, strpos($steamId, '/id/') + 4, -1);
                    $custom = true;
                } else {
                    return null;
                }
                
                return [
                    'id' => $steamId,
                    'custom' => $custom
                ];
            }
        }

        return null;
    }

    /**
     * Extract owner Steam ID
     * 
     * @param $code
     * @return mixed
     */
    public static function extractOwnerId($code)
    {
        $ownerCode = '"owner":"';
        $start = strpos($code, $ownerCode);
        if ($start !== false) {
            $steamid = '';

            for ($i = $start + strlen($ownerCode); $i < strlen($code); $i++) {
                if (substr($code, $i) === '"') {
                    break;
                }

                $steamid .= substr($code, $i);
            }

            return $steamid;
        }

        return null;
    }
}
