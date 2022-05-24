<?php

namespace Tests\Feature\Sessions;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    /**
     * Test if the user is registered and redirects to the homepage as logged-in user.
     *
     * @return void
     */
    public function testItRegistersAndRedirectsToHomepageAsLoggedinUser(): void
    {
        $response = $this->post('register', array(User::factory()->createOneQuietly([
            'username' => 'janedoe',
        ])));

        $response->assertRedirect('/');
    }
}
