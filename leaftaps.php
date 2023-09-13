<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class leaftaps extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    
    public function loginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Leaftaps Login')
                    ->type('USERNAME','demosalesmanager')
                ->type('PASSWORD','crmsfa')
                ->press('Login')
                ->clicklink('CRM/SFA')
                ->assertTitle('My Home | opentaps CRM')
                ->pause(1000)
                ->clickLink('Leads')
                ->press('Create Lead')
                ->type('companyName','TCS')
                ->type('firstName','Raji')
                ->type('lastName','laksh')
                ->press('Create Lead')
                ->assertTitle('View Lead | opentaps CRM');  
        });
    }
}
