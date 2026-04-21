<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the short_title attribute of Book model.
     */
    public function test_book_stores_and_retrieves_short_title_correctly(): void
    {
        $author = Author::create([
            'name' => 'John',
            'surname' => 'Doe',
            'birthdate' => '1970-01-01',
        ]);

        $book = Book::create([
            'title' => 'The Great Gatsby',
            'short_title' => 'Gatsby',
            'year' => 1925,
            'author_id' => $author->id,
        ]);

        $retrievedBook = Book::find($book->id);

        $this->assertEquals('Gatsby', $retrievedBook->short_title);
    }
}
