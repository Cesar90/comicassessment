<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use App\CustomServices\HelperServices;
use App\CustomServices\ComicService;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewindex($comicId = null, Request $request)
    {
        $viewData = [];
        $todayComic = ComicService::get($comicId);
        if(empty($todayComic->num)){
            return view('errors.404')
                ->with("viewData");
        }

        $viewData['comic'] = $todayComic;
        if(!empty($comicId)){
            $nextComic = ComicService::get($todayComic->num + 1);
            if(!empty($nextComic->num)){
                $viewData['comic']->next = $todayComic->num + 1;
            }
            if(empty($viewData['comic']->next)){
                $nextComic = ComicService::get($comicId + 2);

                if(!empty($nextComic->num)){
                    $viewData['comic']->next = $comicId + 2;
                }
            }
        }

        if(!empty($comicId) && $comicId == 1){
            $viewData['comic']->prev = 0;
        } else {
            $viewData['comic']->prev = $todayComic->num - 1;
            $prevComic = ComicService::get($viewData['comic']->prev);
            if(empty($prevComic->num)){
                $prevComic = ComicService::get($comicId - 2);
                $viewData['comic']->prev = $prevComic->num;
            }
        }
        return view('index')
            ->with("viewData", $viewData);
    }

}