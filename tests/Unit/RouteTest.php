<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    public function testRootRoute()
    {
        $response = $this->get("/");
        $response->assertStatus(200);
    }

    public function testComicRoute()
    {
        $response = $this->get("/comic/404");
        $response->assertStatus(404);
    }

}
