<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditPostTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * Test it allows a post to be edited by an admin.
     *
     * @return void
     */
    public function testItAllowsAdminToEditPost(): void
    {
        $user = User::factory()->createOneQuietly([
            'is_admin' => 1,
        ]);

        $post = Post::factory()->createOneQuietly();

        $response = $this->actingAs($user)->get(route('posts.edit', $post));

        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.edit');
    }

    /**
     * Test it forbids post from being edited by non-admin.
     *
     * @return void
     */
    public function testItForbidsEditingPost(): void
    {
        $user = User::factory()->createOneQuietly();

        $post = Post::factory()->createOneQuietly();

        $response = $this->actingAs($user)->get(route('posts.edit', $post));

        $response->assertStatus(403);
    }
}
