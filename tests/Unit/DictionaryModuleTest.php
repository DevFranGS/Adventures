<?php

namespace Tests\Feature;

use App\Dictionary;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DictionaryModuleTest extends TestCase
{
    /**
     * @test
     * @testdox Testea en el modelo la funcion estatica translate
     */
    function it_model_the_translate()
    {
        $this->assertEquals(Dictionary::translate('hola','en_UK'),'Hello');
        $this->assertEquals(Dictionary::translate('holas','en_UK'),'holas');
        $this->assertEquals(Dictionary::translate('',''),'');
        $this->assertEquals(Dictionary::translate('ciao','en_UK'),'Hello');
    }
}
