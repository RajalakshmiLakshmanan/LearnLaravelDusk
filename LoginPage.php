<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return 'http://leaftaps.com/opentaps/control/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
       // $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }

    public function userEnterValidLoginCredentials(Browser $browser)
    {
        $browser->assertSee('Leaftaps Login')
                ->type('USERNAME','demosalesmanager')
                ->type('PASSWORD','crmsfa')
                ->click('#login > p:nth-child(3) > input')
                ->assertSee('Demo Sales Manager')
                ->clickLink('CRM/SFA')
                ->clickLink('Leads')
                ->assertSee('My Leads');




    }
   




}
