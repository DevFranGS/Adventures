<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DictionaryRouteTest extends TestCase
{
    /**
     * @test
     * @testdox Testea la página inicial
     */
    function it_load_the_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    function it_load_the_terms_list_page()
    {
        $response = $this->get('/dictionary');

        $response->assertStatus(200);
    }

    /** @test  */
    function it_load_the_terms_details_page()
    {
        $this->get('/dictionary/4')
            ->assertStatus(200);
    }

    /** @test  */
    function it_load_the_news_terms_page()
    {
        $this->get('/dictionary/create')
            ->assertStatus(200);
    }
}
