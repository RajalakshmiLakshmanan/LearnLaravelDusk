<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class checkAlertSetAndCleredTest extends DuskTestCase
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
                   // ->click('#episode-card-10086 > div.episode-card-actions.bg-dark-white.d-flex.align-items-center > div.py-1.px-2.data-card-action.bd-highlight.align-self-start.align-self-center.alert-danger.flex-fill.small-action.cursor-pointer > div.d-flex > span > span')
                    ->clickAtXpath('//span[@class="btn-down"]')
                    ->clickAtXpath('(//div[@class="flex-grow-1"])[3]')
                    ->click('#wait-alert')
                    ->select('#wait-alert','240')               
                   ->waitFor('#app > div > main > div.container-fluid.pr-0.pl-0 > div > div.reorder-sm.pl-0.pr-0.pt-4.col-lg-7.col-xl-9.panel-border > div > div > div.mb-4 > div > div:nth-child(4) > div:nth-child(2) > div.custom-modal-body.shadow > div > div > div:nth-child(5) > div > div.thread-actions.text-left > button.btn.icon-button.btn-primary')
                    ->click('#app > div > main > div.container-fluid.pr-0.pl-0 > div > div.reorder-sm.pl-0.pr-0.pt-4.col-lg-7.col-xl-9.panel-border > div > div > div.mb-4 > div > div:nth-child(4) > div:nth-child(2) > div.custom-modal-body.shadow > div > div > div:nth-child(5) > div > div.thread-actions.text-left > button.btn.icon-button.btn-primary')
                   
                  //  ->clickAtXpath('//span[text()="Wait"]')
                    ->pause(3000)
                    ->assertSee('Waiting')
                    ->click('#dropdown-menu-button')
                    ->clickAtXpath('//span[text()="Audit"]')
                    ->pause(3000)
                    ->assertSee('Set to wait')
                    ->pause(2000)
                    ->press('Search')
                    ->pause(2000)
                    ->type('#search-name','David')
                    ->pause(2000)
                    ->click('#searchContainer___BV_modal_footer_ > button.btn.btn-primary')
                    //->click('#dropdown-menu-button')    
                    //->click('#app > div > div > nav > div > div > ul > li:nth-child(1) > a > div > div.col > span')
                    ->clickAtXpath('//span[contains(text(),"Waiting")]')
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
                    ->assertSee('Cleared wait alert')
                    ->pause(1000)
                    ->click('#navbarSupportedContent > ul.navbar-nav.ml-auto.align-items-center > li:nth-child(5) > a');                            

    });
  }
    
}
