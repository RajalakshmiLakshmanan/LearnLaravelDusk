<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ajioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.ajio.com/')
                   // ->assertSee('Laravel');
                   ->pause(2000)
                   ->mouseOver('#appContainer > div.false.header-wrapper > div > header > div.header-right > div.menu-newlist > ul > li:nth-child(1) > a')
                   ->clickLink('Bags & Wallets')
                   ->assertTitle('Bags And Wallets');
        });
    }
}
