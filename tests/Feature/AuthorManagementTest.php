<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     *
     */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/author', [
            'name' => 'Author Name',
            'dob' => '05/14/1995'
        ]);

        $authors = Author::all();

        $this->assertCount(1, $authors);
        $this->assertInstanceOf(Carbon::class, $authors->first()->dob);

        $this->assertEquals('1995/14/05', $authors->first()->dob->format('Y/d/m'));
    }
}
