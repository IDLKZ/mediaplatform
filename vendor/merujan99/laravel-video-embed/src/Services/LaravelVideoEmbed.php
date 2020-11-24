<?php

namespace Merujan99\LaravelVideoEmbed\Services;

use Illuminate\Support\Str;
use MediaEmbed\MediaEmbed;

class LaravelVideoEmbed
{
  public function parse($url = null, $whitelist = [], $params = [], $attributes = []) {

    $MediaEmbed = new MediaEmbed();

    $MediaObject = $MediaEmbed->parseUrl($url);

    if ($MediaObject)
    {

      if(is_array($params))
      {
        $MediaObject->setParam($params);
      }

      if(is_array($attributes))
      {
        $MediaObject->setAttribute($attributes);
      }


      if (!empty($whitelist))
      {

        if(!in_array($MediaObject->name(), $whitelist))
        {

          return false;

        }

      }

      return $MediaObject;

    }

    return false;

  }

  public static function getYoutubeThumbnail($url = null)
  {
      $MediaEmbed = new MediaEmbed();

      $MediaObject = $MediaEmbed->parseUrl($url);

      if($MediaObject)
      {
          return "https://img.youtube.com/vi/{$MediaObject->id()}/maxresdefault.jpg";
      }

      return false;
  }

  public static function getVimeoThumbanail($url){
        if($url){
            $id = Str::of($url)->ltrim('https://vimeo.com/');
            $data = @file_get_contents("https://vimeo.com/api/oembed.json?url=http://vimeo.com/".$id);
            if($data){
                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$id.".php"));
                return $hash[0]["thumbnail_medium"];
            }
            else{
                return "/images/no-image.png";
            }
        }
        else{
            return "/images/no-image.png";
        }
  }



}
