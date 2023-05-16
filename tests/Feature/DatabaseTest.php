<?php

namespace Tests\Feature;
use App\Models\Posts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_post_model()
    {
        Posts::create([
            'title' => 'Test Post',
            'description' => 'Test Content',
        ]);
        
        $this->assertDatabaseCount('posts', 1);
    }
}
