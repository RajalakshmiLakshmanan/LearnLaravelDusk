<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\LoginPage;

class createLeadTest extends DuskTestCase
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
                    ->clickLink('Create Lead')
                    //
                   // ->waitForText('Company Name')
                   ->waitFor('#createLeadForm_companyName',10, function ($element) {
                    return $element->isClickable();
                   })
                     ->pause(2000)
                  // ->script("document.querySelector('#createLeadForm_companyName').click();")
                     ->script("document.querySelector('#createLeadForm_companyName').value = 'TCS';");
                    //->type('companyName','TCS')
                    //->type('firstName','Nithi')
                    $browser->script("document.querySelector('#createLeadForm_firstName').value = 'Nithi';");
                    //->type('lastName','R')
                    $browser->script("document.querySelector('#createLeadForm_lastName').value = 'Ram';");

                    //$browser->click('#ext-gen653')
                    $browser->pause(2000)
                    ->clickAtXpath('//input[@value="Create Lead"]')
                    ->pause(2000)
                    ->assertSee('View Lead');
        });
    }
}
