<?php

namespace Tests\Feature;

use App\Dictionary;
use App\Http\Controllers\DictionaryController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class DictionaryControllerTest extends TestCase
{

    /** @test  */
    function it_load_the_edit_terms_page_of_one_terms_that_not_exit()
    {
        $this->get('/dictionary/3/edit')
            ->assertStatus(302);
    }

    /** @test  */
    function it_load_the_update_terms_page_of_one_terms_that_not_exit()
    {
        $this->get('/dictionary/3/update')
            ->assertStatus(404);
    }

    /** @test  */
    function it_load_the_term_not_exist_page()
    {
        $this->get('/dictionary/3')
            ->assertStatus(302);
    }


    /**
     * @test
     * @testdox Testea la funcion estatica translate con parametros
     */
    function it_run_the_static_function_translate_with_param()
    {
        $response = $this->patch('translate', ['term' => 'hola', 'language' => 'ru_RU']);

        $response->assertStatus(302);
    }
    /**
     * @test
     * @testdox Testea la funcion estatica translate sin parametros
     */
    function it_run_the_static_function_translate_without_param()
    {
        $response = $this->patch('translate', []);

        $response->assertStatus(200);
    }

    /**
     * @test
     * @testdox Testea la funcion estatica translate sin parametros
     */
    function it_save_a_new_term_with_param()
    {
        //$faker = Faker::create();
        $term = factory(Dictionary::class)->create();
        $response = $this->post('dictionary', ['term' => $term->term, 'language' => $term->language, 'translate_id' => 1]);

        $response->assertStatus(302);
    }

    /**
     * @test
     * @testdox Testea el controlador y su metodo de creación de un termino
     */
    function it_create_a_new_term_with_param()
    {

        $term = factory(Dictionary::class)->create();
        $num_terms = Dictionary::count();
        $response =  (new DictionaryController)->store(new \Illuminate\Http\Request([
            'term' => $term->term,
            'language' => $term->language,
            'translate_id' => 1,
        ]));
        //$response->assertStatus(200);
        $this->assertEquals($num_terms + 1, Dictionary::count());
    }

    /**
     * @test
     * @testdox Testea el controlador y su metodo de borrado de un termino
     */
    function it_delete_term()
    {
        $num_terms = Dictionary::count();
        $term = Dictionary::latest('id')->first();
        $response =  (new DictionaryController)->destroy($term->id);
        //$response->assertStatus(200);
        $this->assertEquals($num_terms - 1, Dictionary::count());
    }
     /**
     * @test
     * @testdox Testea la eliminacion de un termino
     */
    function it_destroyer_a_term()
    {
        $term = Dictionary::latest('id')->first();
        $response = $this->delete('dictionary', ['id' => $term]);

        $response->assertStatus(405);
    }
}
