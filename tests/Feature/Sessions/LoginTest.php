<?php

namespace Tests\Feature\Sessions;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * Guest can view the login form.
     *
     * @return void
     */
    public function testItAllowsUserToViewALoginForm(): void
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('sessions.create');
    }

    /**
     * User cannot view the login form.
     * @return void
     */
    public function testItRedirectsLoggedInUserFromViewingALoginForm(): void
    {
        $user = User::factory()->createOneQuietly();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }

    /**
     * User can log in with correct credentials and is redirected to the homepage.
     * @return void
     */
    public function testItAuthenticatesUserWithCorrectCredentials(): void
    {
        $this->withoutMiddleware();

        $user = User::factory()->createOneQuietly([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
    }

    /**
     * User cannot log in with an unknown password.
     * @return void
     */
    public function testItForbidsUserFromLoggingInWithIncorrectPassword(): void
    {
        $user = User::factory()->createOneQuietly([
            'password' => bcrypt('password'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
