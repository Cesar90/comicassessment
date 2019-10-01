<?php

namespace App\CustomServices;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ComicService
{
    public static function getUrlToRequest($comicId = null)
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
}
