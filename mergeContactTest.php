<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class mergeContactTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://leaftaps.com/opentaps/control/login')
                    ->assertSee('Leaftaps Login')
                    ->type('USERNAME','demosalesmanager')
                    ->type('PASSWORD','crmsfa')
                    ->click('#login > p:nth-child(3) > input')
                    ->assertSee('Welcome')
                    ->clickLink('CRM/SFA')
                    ->clickLink('Accounts')
                    ->clickLink('Merge Accounts')
                    ->assertUrlIs('http://leaftaps.com/crmsfa/control/mergeAccountsForm')
                    ->pause(2000)
                    ->clickAtXpath('(//img[@src="/images/fieldlookup.gif"])[1]')
                    ->assertSee('Find Accounts');
        $orgwindow = $browser->driver->getWindowHandle();
        $window = collect($browser->driver->getWindowHandles())->last();
        //$browser->driver->switchTo()->window($window);
        $browser->driver->switchTo()->window($window);
        $browser->pause(2000)
                ->clickAtXpath('(//div[contains(@class,"x-grid3-col-partyId")])[1]/a');
        $browser->driver->switchTo()->window($orgwindow);
        $browser->pause(2000)
                ->clickAtXpath('(//img[@src="/images/fieldlookup.gif"])[2]')
                ->assertSee('Find Accounts');
                $orgwindow1 = $browser->driver->getWindowHandle();
                $window1 = collect($browser->driver->getWindowHandles())->last();        
                $browser->driver->switchTo()->window($window1);
                $browser->pause(2000) 
                        ->clickAtXpath('(//div[contains(@class,"x-grid3-col-partyId")])[2]/a'); 
                $browser->driver->switchTo()->window($orgwindow1);    
                $browser->pause(3000)
                        ->clickAtXpath('//a[@class="buttonDangerous"]')
                        ->waitForDialog()
                        ->acceptDialog()
                        ->assertSee('Account Details');


        });
    }
}
