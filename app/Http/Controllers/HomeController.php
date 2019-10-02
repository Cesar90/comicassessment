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
            return response()
                ->view('errors.404',[],404);
        }

        $viewData['comic'] = ComicService::getNextAndPreComic($todayComic, $comicId);

        return view('index')
            ->with("viewData", $viewData);
    }

}