<?php

namespace Tests\Feature;
use App\Dictionary;
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
    function it_load_the_term_details_page()
    {
        $term = Dictionary::first();
        $url = '/dictionary/' . $term->id;
        $this->get($url)
            ->assertStatus(200);
    }

    /** @test  */
    function it_load_the_news_terms_page()
    {
        $this->get('/dictionary/create')
            ->assertStatus(200);
    }

    /** @test  */
    function it_load_the_edit_terms_page()
    {
        $term = Dictionary::first();
        $this->get('/dictionary/' . $term->id  . '/edit')
            ->assertStatus(200);
    }

    /** @test  */
    function it_load_the_update_terms_page()
    {
        $this->get('/dictionary/1/update')
            ->assertStatus(404);
    }

    /** @test  */
    function it_load_the_translate_terms_page()
    {
        $this->get('/translate')
            ->assertStatus(200);
    }

    function it_load_the_translate_terms_page_with_correct_param()
    {
        $this->get('/translate', ['term' => 'Hola', 'language' => 'en_UK'])
            ->assertStatus(200);
    }


    function it_load_the_translate_terms_page_with_not_corret_param()
    {
        $this->get('/translate', ['term' => 'Holas', 'language' => 'en_UK'])
            ->assertStatus(200);
    }

    function it_load_the_translate_terms_page_with_empty_param()
    {
        $this->get('/translate', ['term' => '', 'language' => ''])
            ->assertStatus(200);
    }
}
