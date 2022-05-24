<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItAllowsAdminToCreatePost(): void
    {
        $user = User::factory()->createOneQuietly([
            'is_admin' => 1,
        ]);

        $response = $this->actingAs($user)->get(route('posts.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.create');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItForbidsCreatingPost(): void
    {
        $user = User::factory()->createOneQuietly();

        $response = $this->actingAs($user)->get(route('posts.create'));

        $response->assertStatus(403);
    }
}
