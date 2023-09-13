<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class learnAlertTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_prompt')
                    ->assertSee('The Window Object')
                    ->withinFrame('#iframeResult', function ($browser) {
                        $browser->pause(3000)
                                ->press('Try it')
                                ->waitForDialog()
                                //->driver->switchTo()->alert()->sendKeys('raji')
                                ->acceptDialog()
                                ->assertSee('How are you today?');
                    });
                    });
    }

    public function testWebTable()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.leafground.com/table.xhtml;jsessionid=node0z304dybr4jjckopykc36w3ul440739.node0')
                    ->assertSee('Customer Analytics Table')
                    ->pause(2000)
                    //->within('#form\:j_idt89_data', function ($table) {
                        // Count the number of rows
                       // $rowCount = $table->elements('tr')->count();
                        //echo "Number of rows: $rowCount\n";
                   // });

                   ->table('#form\:j_idt89 > div.ui-datatable-scrollable-body > table', function ($table) {
                    $table->assertSee('Juan Murillo');

                });
    
    });

    }
}
