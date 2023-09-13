<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class hallgreenForm extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                /*  ->assertSee('Hall Green Health, Stratford Road')
                    ->type('user_login','silicon')
                    ->type('password','I6e25$Bxi6Zj')
                    ->press('Login')
                    ->press('Accept')
                    ->assertTitle('Hall Green Health, Stratford Road');*/
                    
                    ->assertSee('Username or Email Address')
                    //->withToken()
                    ->type('log','silicon')
                    ->type('pwd','I6e25$Bxi6Zj')
                    ->press('Log In')
                    //->submitForm('wp-submit')
                    ->pause(2000)
                   // ->assertTitle('Transactions ‹ Hall Green Health — WordPress');

                   ->assertSee('Transactions')
                  ->clickLink('Medical report request');                    
            
        });
    }
}
