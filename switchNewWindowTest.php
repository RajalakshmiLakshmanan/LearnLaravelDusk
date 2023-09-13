<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class switchNewWindowTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.leafground.com/window.xhtml')
                    ->assertSee('Click and Confirm new Window Opens')
                    ->click('#j_idt88\:new > span');
                    $orgWindow = $browser->driver->getWindowHandle();
                    $window = collect($browser->driver->getWindowHandles())->last();
            //$browser->info($window);
            //$this->dump($window);
           // $this->info($window);
            $browser->driver->switchTo()->window($window);
           
           $browser->pause(2000)
                    ->assertSee('Dashboard')
                    ->driver->switchTo()->window($orgWindow);
            $browser->pause(2000)
                    ->assertUrlIs('https://www.leafground.com/window.xhtml');   
                   // >assertSee('Click and Confirm new Window Opens');

        });
       // $this->info($window);
    }
public function testOpenMultipleWindows()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/window.xhtml')
                ->assertSee('Find the number of opened tabs')
                ->click('#j_idt88\:j_idt91 > span');
        $orgWindow = $browser->driver->getWindowHandle();
        $window = collect($browser->driver->getWindowHandles())->last();
        //$this->info($window);
       // dd($window);
       $browser->driver->switchTo()->window($window);

        $browser->pause(8000)
                ->assertSee('Customer Analytics Table')
                ->pause(2000);
               // ->assertSee('Questions attended');

    });       
                
}
public function testAlert()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/alert.xhtml')
                ->pause(2000)
                ->assertSee('Alert (Confirm Dialog)')
                ->click('#j_idt88\:j_idt93 > span.ui-button-text.ui-c')
               // ->waitFor('j_idt88:j_idt93',10)
               //->pause(5000)
                //->within('j_idt88:j_idt93', function ($browser) {
                  //  $browser->assertSee('Did you call me?')
                    //        ->accept();
                //})
                ->waitForDialog()
                ->acceptDialog()
                ->assertSee('User Clicked : OK');

    });
}
public function testSweetAlert()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/alert.xhtml')
                ->pause(2000)
                ->assertSee('Sweet Modal Dialog')
                ->click('#j_idt88\:j_idt100 > span.ui-button-text.ui-c')
                //->waitForDialog()
                ->waitForText('Modal Dialog (Sweet Alert)')
                ->click('#j_idt88\:j_idt101 > div.ui-dialog-titlebar.ui-widget-header.ui-helper-clearfix.ui-corner-top.ui-draggable-handle > a > span')
                ->pause(2000)
                ->assertSee('Sweet Modal Dialog');





    });

}
public function testframeTag()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/frame.xhtml')
                ->pause(2000)
                ->withinFrame('#j_idt88 > div > div:nth-child(1) > div:nth-child(1) > iframe', function ($browser) {
                    $browser->pause(3000)
                            //->press('Click Me')
                           // ->click('#Click')
                           ->clickAtXpath('//button[@id="Click"]')
                            ->pause(2000)
                            ->assertSee('Hurray! You Clicked Me.');
                            //->waitUntilMissing('iframe[src=default.xhtml]');
                } );
       /* $browser->withinFrame('#frame2', function ($browser) {
                    $browser->pause(2000)
                            ->clickAtXpath('//button[@id="Click"]')
                            ->pause(2000)
                            ->assertSee('Hurray! You Clicked Me.');

        });*/
        //$browser->driver->switchTo()->frame('id of iframe');

    }  );              

}
//not working 
public function testNestedframeTag()

{
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/frame.xhtml')
                ->pause(2000);
                //->switchToFrame('#j_idt88 > div > div:nth-child(2) > div > iframe')
                //->switchToFrame('#frame2')
        $browser->driver->switchTo()->frame('#j_idt88 > div > div:nth-child(1) > div:nth-child(1) > iframe'); 
       // $browser->driver->switchTo()->frame(4);
                     $browser->pause(2000)
                            //->clickAtXpath('//button[@id="Click"]')
                            ->press('Click Me')
                            ->pause(2000)
                            ->assertSee('Hurray! You Clicked Me.');             

    } );               

}
public function testSwitchframeTag()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/frame.xhtml')
                ->pause(2000)
                ->withinFrame('#j_idt88 > div > div:nth-child(2) > div > iframe', function ($browser) {
                    $browser->withinFrame('#frame2', function ($browser){
                    $browser->pause(3000)
                            //->press('Click Me')
                           // ->click('#Click')
                           ->clickAtXpath('//button[@id="Click"]')
                            ->pause(2000)
                            ->assertSee('Hurray! You Clicked Me.');
                            //->waitUntilMissing('iframe[src=default.xhtml]');
                } );
            });
        });

            }

}