<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use App\CustomServices\ComicService;
use App\Post;

class AccessorTest extends TestCase
{
    /**
     * Test accessor method
     *
     * @return void
     */
    public function testObjectComic()
    {
        $expectedObject = new \stdClass();
        $expectedObject->month = 9;
        $expectedObject->num = 2209;
        $expectedObject->link = "";
        $expectedObject->year = 2019;
        $expectedObject->news = "";
        $expectedObject->safe_title = "Fresh Pears";
        $expectedObject->transcript = "";
        $expectedObject->alt = "I want to sell apples but I'm still working on getting the machine to do the cutting and grafting.";
        $expectedObject->img = "https://imgs.xkcd.com/comics/fresh_pears.png";
        $expectedObject->title = "Fresh Pears";
        $expectedObject->day = 30;
        $comicApi = ComicService::get(2209);
        $this->assertEquals($expectedObject, $comicApi);
    }
}