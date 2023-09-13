<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class checkPartAlertTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://cookie.siliconpreview.co.uk/dashboard')
                    ->assertSee('Cookie')
                    ->type('user_login','aarthi@nedholdings.com')
                    ->type('password','#7scBtPjBuEE')
                    ->press('Login')
                    ->pause(2000)
                    ->clickLink('Accept','button')
                    ->pause(5000)
                    //->click('#navbarSupportedContent > ul.navbar-nav.ml-auto.align-items-center > li:nth-child(2) > button > div')
                    ->press('Search')
                    ->pause(3000)
                    ->type('#search-name','David')
                    ->pause(2000)
                    ->click('#searchContainer___BV_modal_footer_ > button.btn.btn-primary')
                    ->assertSee("Patient's last name:")
                    ->pause(2000)
                    ->clickAtXpath('//a[contains(text(),"DAVID, Lara")]')
                    ->assertSee('Form:')
                    ->pause(2000)
                    ->clickAtXpath('//span[@class="btn-down"]')
                    ->clickAtXpath('//div[text()="Park"]')
                    ->click('#park-alert')
                    ->select('#park-alert',"240")
                    ->clickAtXpath('//span[text()="Park"]')
                    
                    //->assertSee('Parked')
                    ->pause(3000)
                    ->click('#dropdown-menu-button')
                    ->clickAtXpath('//span[text()="Audit"]')
                    ->pause(3000)
                    ->assertSee("Set to park")
                    ->pause(2000)
                    ->press('Search')
                    ->pause(2000)
                    ->type('#search-name','David')
                    ->pause(2000)
                    ->click('#searchContainer___BV_modal_footer_ > button.btn.btn-primary')
                    //->click('#dropdown-menu-button')    
                    //->click('#app > div > div > nav > div > div > ul > li:nth-child(1) > a > div > div.col > span')
                    //->clickAtXpath('//span[contains(text(),"Waiting")]')
                    ->pause(3000)
                    ->clickAtXpath('//a[contains(text(),"DAVID, Lara")]')
                    ->pause(3000)
                    ->clickAtXpath('//div[text()="Clear"]')  
                    ->clickAtXpath('//button[contains(text(),"Confirm")]')
                    //->acceptDialog()
                    ->pause(3000)
                    ->click('#dropdown-menu-button')  
                    ->clickAtXpath('//span[text()="Audit"]')
                    ->pause(3000)
                    ->assertSee('Cleared park alert')
                    ->pause(1000)
                    ->click('#navbarSupportedContent > ul.navbar-nav.ml-auto.align-items-center > li:nth-child(5) > a');                            

    });
            
      
    }
}
