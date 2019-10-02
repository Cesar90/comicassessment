<?php

namespace App\CustomServices;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ComicService
{
    private static function getUrlToRequest($comicId = null)
    {
        $endPoint = 'https://xkcd.com/info.0.json';
        if(!empty($comicId) || $comicId == 0){
            $endPoint = 'https://xkcd.com/'.$comicId.'/info.0.json';
        }
        return $endPoint;
    }

    public static function get($comicId = null)
    {
        $client = new Client();
        try {
            $result = $client->get(static::getUrlToRequest($comicId));
            $comic = json_decode($result->getBody());
        } catch (\Exception $e) {
            $comic = new \stdClass();
        }
        return $comic;
    }

    public static function getNextAndPreComic($comic, $comicId)
    {
        if(!empty($comicId)){
            $nextComic = self::get($comic->num + 1);
            if(!empty($nextComic->num)){
                $comic->next = $comic->num + 1;
            }
            if(empty($comic->next)){
                $nextComic = ComicService::get($comicId + 2);

                if(!empty($nextComic->num)){
                    $comic->next = $comicId + 2;
                }
            }
        }

        if(!empty($comicId) && $comicId == 1){
            $comic->prev = 0;
        } else {
            $comic->prev = $comic->num - 1;
            $prevComic = self::get($comic->prev);
            if(empty($prevComic->num)){
                $prevComic = ComicService::get($comicId - 2);
                $comic->prev = $prevComic->num;
            }
        }
        return $comic;
    }
}
