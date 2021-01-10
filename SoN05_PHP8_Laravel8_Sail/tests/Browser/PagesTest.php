<?php

namespace Tests\Browser;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Class PagesTest
 * @package Tests\Browser
 * @group pages
 */
class PagesTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testPagesListagem(): void
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/pages')
                ->assertSee('Listagem de Páginas');
        });
    }

    public function testAddNewPage(): void
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                // Login
                ->loginAs($user)

                // go to create page
                ->visit('/pages/create')
                ->assertSee('Criando uma Página')

                // fill and submit the form
                ->type('title', 'Sobre nós')
                ->type('body', 'Conteúdo da página')
                ->press('salvar')

                // confirm if is stored
                ->assertPathIs('/pages')
                ->assertSee('Sobre nós');
        });
    }

    public function testRemovePage(): void
    {
        $user = User::factory()->create();

        /** @var Page $page */
        $title = 'Página cadastrada para teste';
        $page = Page::factory()->create([
            'title' => $title
        ]);

        $this->browse(function ($browser) use ($user, $page, $title) {
            $browser
                // Login
                ->loginAs($user)
                // see list
                ->visit('/pages')
                ->assertSee($title)
                // see show
                ->visit('/pages/'.$page->id)
                ->assertSee($title)
                // click delete button
                ->press('remover')
                // confirm if is deleted
                ->assertPathIs('/pages')
                ->assertDontSee($title);
        });
    }

    /**
     * @group pages__crud_navigation
     **/
    public function testNavigation(): void
    {
        $user = User::factory()->create();
        $pages = Page::factory(7)->create();

        $this->browse(function ($browser) use ($user, $pages) {
            $browser->loginAs($user);

            $browser
                ->visit('/pages')
                ->press('#btnNovo')
                ->assertPathIs('/pages/create');

            $browser
                ->visit('/pages/create')
                ->clickLink('voltar')
                ->assertPathIs('/pages');

            $browser
                ->visit('/pages')
                ->clickLink('ver')
                ->assertPathIs('/pages/'.$pages[0]->id);

            $browser
                ->visit('/pages/'.$pages[0]->id)
                ->clickLink('voltar')
                ->assertPathIs('/pages');
        });
    }
}
