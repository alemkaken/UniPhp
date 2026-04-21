<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new author via POST request.
     */
    public function test_can_create_author_via_post_request(): void
    {
        $authorData = [
            'name' => 'Jane',
            'surname' => 'Austen',
            'birthdate' => '1775-12-16',
        ];

        $response = $this->post(route('authors.store'), $authorData);

        // Verify correct HTTP status code (302 for redirect)
        $response->assertStatus(302);

        // Verify correct redirect behavior
        $response->assertRedirect(route('authors.index'));

        // Verify successful creation and database storage
        $this->assertDatabaseHas('authors', $authorData);

        $author = Author::first();
        $this->assertEquals('Jane', $author->name);
        $this->assertEquals('Austen', $author->surname);
        $this->assertEquals('1775-12-16', $author->birthdate);
    }
}
