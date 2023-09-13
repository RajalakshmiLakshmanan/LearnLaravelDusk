<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\HomePage;
use Tests\Browser\Pages\LoginPage;
use Tests\Browser\Pages\AuditLogPage;


class waitParkAlertTest extends DuskTestCase
{
    /**
     * Test when the wait alert is added/cleared it is recorded in the Audit log
     *
     * @return void
     */
    public function testwaitAlertSet()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                    ->userLoginWithValidCredentials()
                    ->on(new HomePage)
                    ->searchEpisodeWithLastName()
                    ->setEpisodeWithWaitAlert()
                    ->clickAuditLink()
                    ->pause(3000)
                    ->assertSee('Set to wait')
                    ->pause(2000)
                    ->searchEpisodeWithLastName()
                    ->clearEpisodeWithAlert()
                    ->clickAuditLink()
                    ->assertSee('Cleared wait alert')
                    ->pause(2000)
                    ->clickLink('Logout');
                    
        });
    }

     /**
     * Test when the park alert is added/cleared it is recorded in the Audit log
     *
     * @return void
     */
    public function testParkAlertSet()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                    ->userLoginWithValidCredentials()
                    ->on(new HomePage)
                    ->searchEpisodeWithLastName()
                    ->setEpisodeWithParkAlert()
                    ->clickAuditLink()
                    ->pause(3000)
                    ->assertSee('Set to park')
                    ->pause(2000)
                    ->searchEpisodeWithLastName()
                    ->clearEpisodeWithAlert()    
                    ->clickAuditLink()
                    ->assertSee('Cleared park alert')
                    ->pause(2000)
                    ->clickLink('Logout');
                    
        });
    }
}
