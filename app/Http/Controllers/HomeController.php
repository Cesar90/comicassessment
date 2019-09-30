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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewindex_old($comicId = null, Request $request)
    {
        $comicId = HelperServices::sanitize_int($comicId);
        $viewData = [];
        $client = new Client();
        $isPostRequest = false;
        if($request->isMethod('post')){
            $data = $request->all();
            $comicIdToFind = $data['typenav'] == "pre" ? $comicId - 1 : $comicId + 1;
            $isPostRequest = true;
        }
        $urlToRequest = ComicService::getUrlToRequest($comicId);
        try {
            $result = $client->get($urlToRequest);
        } catch (\Exception $e) {
//            if($isPostRequest){
//                return redirect()->route('navigationview',['comicId'=>$comicIdToFind]);
//            }
            return view('errors.404')
                ->with("viewData");
        }

        $dataResult = json_decode($result->getBody());
        $viewData['comic'] = $dataResult;
        if(!empty($comicId)){
            $nextComic = $this->getComicById($dataResult->num + 1);
            if(!empty($nextComic->num)){
                $viewData['comic']->next = $dataResult->num + 1;
            }
            if(empty($viewData['comic']->next)){
                $nextComic = $this->getComicById($comicId + 2);

                if(!empty($nextComic->num)){
                    $viewData['comic']->next = $comicId + 2;
                }
            }
        }

        if(!empty($comicId) && $comicId == 1){
            $viewData['comic']->prev = 0;
        } else {
            $viewData['comic']->prev = $dataResult->num - 1;
            $prevComic = $this->getComicById($viewData['comic']->prev);
            if(empty($prevComic->num)){
                $prevComic = $this->getComicById($comicId - 2);
                $viewData['comic']->prev = $prevComic->num;
            }
        }

        return view('index')
            ->with("viewData", $viewData);
    }

    public function getComicById_old($comicId)
    {
        $urlToRequest = 'https://xkcd.com/'.$comicId.'/info.0.json';
        $client = new Client();
        try {
            $result = $client->get($urlToRequest);
            //$statusCode = $result->getStatusCode();
            $comic = json_decode($result->getBody());
        } catch (\Exception $e) {
            $comic = new \stdClass();
        }
        return $comic;
    }

}