<?php

namespace Tests\Browser;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Class LoginTest
 * @package Tests\Browser
 * @group login
 */
class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testLoginFailed(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->visit('/login')
                ->assertSee('LOGIN') // botao login text
                ->type('email', $user->email)
                ->type('password', 'wrong_pass')
                ->press('LOGIN')
                ->assertPathIs('/login') // back to login page
                ->assertSee(__('auth.failed')); // show message error
        });
    }

    public function testLoginSuccess(): void
    {
        // dd( posix_getpwuid(posix_geteuid())['name'] ,$_ENV);
        // dd($_ENV['DB_CONNECTION'],$_ENV['DB_DATABASE']);

        /** @var User $user */
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->visit('/login')
                ->assertSee('LOGIN') // botao login text
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('LOGIN')
                ->assertPathIs(RouteServiceProvider::HOME)
                ->assertAuthenticatedAs($user);
        });
    }

    public function testLoginAndLogout(): void
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser

                // Login
                ->loginAs($user )

                // Asset Logged
                ->visit(RouteServiceProvider::HOME)
                ->assertSee('Dashboard')
                ->assertAuthenticated()
                ->assertAuthenticatedAs($user)

                // Logout
                ->logout()
                ->assertGuest();
        });
    }

}
