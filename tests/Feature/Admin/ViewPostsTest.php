<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewPostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test it allows the admin to view all posts.
     *
     * @return void
     */
    public function testItAllowsAdminToViewPosts(): void
    {
        $user = User::factory()->createOneQuietly([
            'is_admin' => 1,
        ]);

        $response = $this->actingAs($user)->get(route('posts.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.index');
    }

    /**
     * Test it forbids admin from viewing all posts.
     *
     * @return void
     */
    public function testItForbidsViewingPost(): void
    {
        $user = User::factory()->createOneQuietly();

        $response = $this->actingAs($user)->get(route('posts.index'));

        $response->assertStatus(403);
    }
}
