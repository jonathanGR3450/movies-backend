<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function getCategory()
    {
        return [
            'name' => 'test one name'
        ];
    }

    public function getCategoryEdit()
    {
        return [
            'name' => 'test two name'
        ];
    }

    public function test_create_category()
    {
        $response = $this->post('category', $this->getCategory());
        $response->assertSessionHas('status', 'Se creo un nuevo registro');
        $response->assertRedirect();
    }

    public function test_edit_category()
    {
        $this->test_create_category();

        $category_edit = $this->getCategoryEdit();
        $response = $this->put('category/1', $category_edit);
        $response->assertSessionHas('status', 'El registro se actualizo correctamente');

        $ddbb_category = Category::find(1);
        $this->assertEquals($ddbb_category['name'], $category_edit['name']);
    }

    public function test_delete_category()
    {
        $category = $this->getCategory();
        $this->test_create_category();

        $category = Category::where('name', $category['name'])->first();

        $response = $this->delete('category/' . $category->id);
        $response->assertSessionHas('status', 'Se elimino el registro con exito');

        $ddbb_category = Category::find($category->id);

        $this->assertNull($ddbb_category);
    }

    public function test_show_category()
    {
        $category = $this->getCategory();
        $this->test_create_category();
        $category = Category::where('name', $category['name'])->first();
        $ddbb_category = Category::find($category->id);
        $this->assertModelExists($ddbb_category);
    }


    // test para el front
    public function test_index_return_view()
    {
        $response = $this->get(route('category.index'));
        $response->assertStatus(200);
    }

    public function test_create_return_view()
    {
        $response = $this->get(route('category.create'));
        $response->assertStatus(200);
    }

    public function test_show_return_view()
    {
        $category = Category::factory()->create();
        $response = $this->get(route('category.show', $category));
        $response->assertStatus(200);
    }

    public function test_edit_return_view()
    {
        $category = Category::factory()->create();
        $response = $this->get(route('category.edit', $category->id));
        $response->assertStatus(200);
    }
}
