<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $this->post("tags",[
            "name" => "PHP"
        ])->assertRedirect("/");

        //VERIFICAR QUE EL TAG EXISTE EN BASE DE DATOS
        $this->assertDatabaseHas("tags",[
            "name" => "PHP"
        ]);

    }

    public function testDestroy()
    {
        $tag = Tag::factory()->create();

        $this->delete("tags/{$tag->id}")->assertRedirect("/");

        $this->assertDatabaseMissing("tags",[
            "name" => $tag->name
        ]);

    }

    public function testValidate()
    {
        $this->post("tags",[
            "name" => ""
        ])
            ->assertSessionHasErrors("name");
    }
}
