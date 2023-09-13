<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class HomePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        //
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
    /**
     * search the form request with Lastname
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function searchEpisodeWithLastName(Browser $browser)
    {
        $browser->press('Search')
                ->pause(3000)
                ->type('#search-name','David')
                ->pause(2000)
                ->click('#searchContainer___BV_modal_footer_ > button.btn.btn-primary')
                ->assertSee("Patient's last name:");      
  


    }
    /**
     * set the selected episode with wait alert
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function setEpisodeWithWaitAlert(Browser $browser)
    {
             $browser->pause(2000)
                     ->clickAtXpath('//a[contains(text(),"DAVID, Lara")]')
                     ->assertSee('Form:')
                     ->pause(2000)
                     ->clickAtXpath('//span[@class="btn-down"]')
                     ->clickAtXpath('(//div[@class="flex-grow-1"])[3]')
                     ->click('#wait-alert')
                     ->select('#wait-alert','240')
                     ->clickAtXpath('//span[text()="Wait"]')
                     ->pause(3000);
                     //->assertSee('Waiting');
             
    }

    /**
     * clear the selected episode with wait alert
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function clearEpisodeWithAlert(Browser $browser)
    {
             $browser->pause(2000)
                     ->clickAtXpath('//a[contains(text(),"DAVID, Lara")]')
                     ->assertSee('Form:')
                     ->pause(2000)
                     ->clickAtXpath('//div[text()="Clear"]')  
                     ->clickAtXpath('//button[contains(text(),"Confirm")]')
                     ->pause(2000);
             
    }

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

    /**
     * set the selected episode with park alert
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function setEpisodeWithParkAlert(Browser $browser)
    {
             $browser->pause(2000)
                     ->clickAtXpath('//a[contains(text(),"DAVID, Lara")]')
                     ->assertSee('Form:')
                     ->pause(2000)
                     ->clickAtXpath('//span[@class="btn-down"]')
                     ->clickAtXpath('//div[text()="Park"]')
                     ->click('#park-alert')
                     ->select('#park-alert',"240")
                     ->clickAtXpath('//span[text()="Park"]')
                     ->pause(3000)
                     ->assertSee('Parked');
             
    }





}
