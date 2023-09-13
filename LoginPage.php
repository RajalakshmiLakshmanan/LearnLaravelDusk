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
        return 'https://cookie.siliconpreview.co.uk/dashboard';
       // return 'https://parklane.foundationpreview.co.uk/dashboard';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
   // public function assert(Browser $browser)
   // {
        //$browser->assertPathIs($this->url());
   // }

    
    /* * Get the element shortcuts for the page.
     *
     * @return array
     
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
    */
    /**
     * Assert that the valid user see the homepage.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function userLoginWithValidCredentials(Browser $browser)
    {
    
               // ->assertPathIs($this->url())
        $browser->assertSee('Cookie')
                ->type('user_login','aarthi@nedholdings.com')
                ->type('password','#7scBtPjBuEE')
        //$browser->type('user_login','silicon')
         //       ->type('password','G7H2fbS3$9f@')
                ->press('Login')
                ->pause(2000)
                ->clickLink('Accept','button')
                ->pause(2000);

    }


}
