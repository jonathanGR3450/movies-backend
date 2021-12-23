<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
    public function getMovie($author_id, $category_id)
    {
        return [
            'name' => 'test one name',
            'release_date' => '2021-02-02',
            'producer' => 'producer test',
            'author_id' => $author_id,
            'category_id' => $category_id
        ];
    }

    public function getMovieEdit($author_id, $category_id)
    {
        return [
            'name' => 'test two name',
            'release_date' => '2021-03-03',
            'producer' => 'producer test edit',
            'author_id' => $author_id,
            'category_id' => $category_id
        ];
    }

    public function create_author()
    {
        return Author::factory()->create();
    }

    public function create_category()
    {
        return Category::factory()->create();
    }

    public function test_create_movie()
    {
        $author = $this->create_author();
        $category = $this->create_category();
        $response = $this->post('movie', $this->getMovie($author->id, $category->id));
        $response->assertSessionHas('status', 'Se creo un nuevo registro');
        $response->assertRedirect();
    }

    public function test_edit_movie()
    {
        $this->test_create_movie();

        $author = $this->create_author();
        $category = $this->create_category();
        $movie_edit = $this->getMovieEdit($author->id, $category->id);
        $response = $this->put('movie/1', $movie_edit);
        $response->assertSessionHas('status', 'El registro se actualizo correctamente');

        $ddbb_movie = Movie::find(1);
        $this->assertEquals($ddbb_movie['name'], $movie_edit['name']);
    }

    public function test_delete_movie()
    {
        $author = $this->create_author();
        $category = $this->create_category();
        $movie = $this->getMovie($author->id, $category->id);
        $this->test_create_movie();

        $movie = Movie::where('name', $movie['name'])->first();
        // dd($movie);
        $response = $this->delete('movie/' . $movie->id);
        // dd($response);
        $response->assertSessionHas('status', 'Se elimino el registro con exito');

        $ddbb_movie = Movie::find($movie->id);

        $this->assertNull($ddbb_movie);
    }

    public function test_show_movie()
    {
        $author = $this->create_author();
        $category = $this->create_category();
        $movie = $this->getMovie($author->id, $category->id);
        $this->test_create_movie();
        $movie = Movie::where('name', $movie['name'])->first();
        $ddbb_movie = Movie::find($movie->id);
        $this->assertModelExists($ddbb_movie);
    }

    // test para el front
    public function test_index_return_view()
    {
        $response = $this->get(route('movie.index'));
        $response->assertStatus(200);
    }

    public function test_create_return_view()
    {
        $response = $this->get(route('movie.create'));
        $response->assertStatus(200);
    }

    public function test_show_return_view()
    {
        $movie = Movie::factory()->create();
        $response = $this->get(route('movie.show', $movie));
        $response->assertStatus(200);
    }

    public function test_edit_return_view()
    {
        $movie = Movie::factory()->create();
        $response = $this->get(route('movie.edit', $movie->id));
        $response->assertStatus(200);
    }
}
