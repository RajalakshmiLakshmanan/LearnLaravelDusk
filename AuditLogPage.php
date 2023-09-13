<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
//use Laravel\Dusk\Page;

class AuditLogPage 
{
    
    /**
     * Assert that the episode is set to wait alert in auditlog
     *
     * @param  Browser  $browser
     * @return void
     */
    public function clickAuditLink(Browser $browser)
    {
        $browser->click('#dropdown-menu-button')
                ->clickAtXpath('//span[text()="Audit"]')
                ->pause(3000);
        
    }



}
