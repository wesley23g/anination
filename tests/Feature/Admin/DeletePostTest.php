<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeletePostTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * Test if deleting a post is allowed as admin.
     *
     * @return void
     */
    public function testItAllowsAdminToDeletePost(): void
    {
        $user = User::factory()->createOneQuietly([
            'is_admin' => 1,
        ]);

        $post = Post::factory()->createOneQuietly();

        $this->actingAs($user)
            ->delete(route('posts.destroy', $post))
            ->assertRedirect();
    }

    /**
     * Test if deleting a post is forbidden for non-admin.
     *
     * @return void
     */
    public function testItForbidsDeletingPost(): void
    {
        $user = User::factory()->createOneQuietly();

        $post = Post::factory()->createOneQuietly();

        $response = $this->actingAs($user)->delete(route('posts.destroy', $post));

        $response->assertStatus(403);
    }
}
