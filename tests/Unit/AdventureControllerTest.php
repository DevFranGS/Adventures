<?php

namespace Tests\Unit;

use App\Adventure;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdventureControlllerTest extends TestCase
{
    /** test */
    function testBasicTest()
    {
       $response = $this->get('/adventure/');
       //die($response);

       $response->assertStatus(200);
    }
}
