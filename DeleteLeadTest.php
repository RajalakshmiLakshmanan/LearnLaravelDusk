<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\LoginPage;

class DeleteLeadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                    ->userEnterValidLoginCredentials()
                    ->clickLink('Find Leads')
                    ->clickAtXpath('//span[text()="Phone"]')
                    ->type('phoneNumber','91')
                    ->press('Find Leads')
                    ->pause(3000)
                    ->clickAtXpath('//div[contains(@class,"x-grid3-cell-inner")]/a')
                    ->pause(2000);
            $textContent = $browser->text('#viewLead_companyName_sp');
            $leadId = preg_replace('/[^0-9]/', '', $textContent);
            $browser->clickLink('Delete')
                    ->clickLink('Find Leads')
                    ->type('id',$leadId)
                    ->press('Find Leads')
                    ->pause(3000)
                    ->assertSee('No records to display');
        });
    }
    

    public function testEditLead()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage) 
                    ->userEnterValidLoginCredentials();   
        });

    }

}
