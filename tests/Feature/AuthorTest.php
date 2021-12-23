<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function getAuthor()
    {
        return [
            'name' => 'test one name'
        ];
    }

    public function getAuthorEdit()
    {
        return [
            'name' => 'test two name'
        ];
    }

    public function test_create_author()
    {
        $response = $this->post('author', $this->getAuthor());
        $response->assertSessionHas('status', 'Se creo un nuevo registro');
        $response->assertRedirect();
    }

    public function test_edit_author()
    {
        $this->test_create_author();

        $author_edit = $this->getAuthorEdit();
        $response = $this->put('author/1', $author_edit);
        $response->assertSessionHas('status', 'El registro se actualizo correctamente');

        $ddbb_author = Author::find(1);
        $this->assertEquals($ddbb_author['name'], $author_edit['name']);
    }

    public function test_delete_author()
    {
        $author = $this->getAuthor();
        $this->test_create_author();

        $author = Author::where('name', $author['name'])->first();

        $response = $this->delete('author/' . $author->id);
        $response->assertSessionHas('status', 'Se elimino el registro con exito');

        $ddbb_author = Author::find($author->id);

        $this->assertNull($ddbb_author);
    }

    public function test_show_author()
    {
        $author = $this->getAuthor();
        $this->test_create_author();
        $author = Author::where('name', $author['name'])->first();
        $ddbb_author = Author::find($author->id);
        $this->assertModelExists($ddbb_author);
    }

    // test para el front
    public function test_index_return_view()
    {
        $response = $this->get(route('author.index'));
        $response->assertStatus(200);
    }

    public function test_create_return_view()
    {
        $response = $this->get(route('author.create'));
        $response->assertStatus(200);
    }

    public function test_show_return_view()
    {
        $author = Author::factory()->create();
        $response = $this->get(route('author.show', $author));
        $response->assertStatus(200);
    }

    public function test_edit_return_view()
    {
        $author = Author::factory()->create();
        $response = $this->get(route('author.edit', $author->id));
        $response->assertStatus(200);
    }
}
