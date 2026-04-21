<?php

namespace Tests\Unit;

use App\Models\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    /**
     * Test the fullName method of Author model.
     */
    public function test_author_full_name_is_concatenated_correctly(): void
    {
        $author = new Author([
            'name' => 'John',
            'surname' => 'Doe',
        ]);

        $this->assertEquals('John Doe', $author->fullName());
    }
}
