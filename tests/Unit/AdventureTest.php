<?php

namespace Tests\Unit;

use App\Adventure;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdventureTest extends TestCase
{
    /** @test */
    function duplicate_works_fine()
    {
        //factory(Adventure::class, 5)->create();
       //var_dump( factory(Adventure::class)->create(['name' => null ]));
       //  $mostViewed = = factory(Adventure::class)->create(['views' => 200]);

        //$adventures = Adventure::mostViewed();

        $this->assertEquals(Adventure::duplicate(1),2);
        $this->assertEquals(Adventure::duplicate(0),0);
        $this->assertEquals(Adventure::duplicate(-1),-2);
            //$mostViewed->id, $adventures->first()->id);
    }
}
