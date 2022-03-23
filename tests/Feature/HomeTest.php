<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Tag;
use Tests\TestCase;

class HomeTest extends TestCase
{

    use RefreshDatabase;

    public function testEmpty()
    {
        $this->get("/")
             ->assertStatus(200)
             ->assertSee("No hay etiquetas");
    }

    public function testWithData()
    {

        $tag = Tag::factory()->create();

        $this->get("/")
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee("No hay etiquetas");
    }
}
