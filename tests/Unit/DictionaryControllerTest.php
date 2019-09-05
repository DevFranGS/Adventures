<?php

namespace Tests\Feature;

use App\Dictionary;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DictionaryControllerTest extends TestCase
{
    /**
     * @test
     * @testdox Testea la funcion estatica translate con parametros
     */
    function it_run_the_static_function_translate_with_param()
    {
        $response = $this->patch('translate', ['term' => 'hola', 'language' => 'en_UK']);

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

}
