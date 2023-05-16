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
        Posts::factory()->count(3)->create();
        
        $this->assertDatabaseCount('posts', 3);
    }
}
