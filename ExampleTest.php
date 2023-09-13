<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.snapdeal.com/')
                    //->assertSee('Laravel');
                    ->pause(3000);//#leftNavMenuRevamp > div.leftNavWrapperRevamp > div.leftNavigationLeftContainer.expandDiv > ul > li:nth-child(2) > a > span.catText
                    //->assertVisible('(//span[@class="catText"])[1]');
            $hoverelement = $browser->element('(//span[@class="catText"])[1]');
            $browser->mouseover($hoverelement);
            //$browser->waitFor('//span[text()="Sports Shoes"]');
            $browser->pause(5000);
            $browser->click('//span[text()="Sports Shoes"]');  
            //#category1Data > div.leftData.colDataBlk > div > div > p:nth-child(2) > a > span  
        });
    }
    public function testflipkart()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.flipkart.com/')
                    //->assertSee('Laravel');
                    ->pause(3000);//#leftNavMenuRevamp > div.leftNavWrapperRevamp > div.leftNavigationLeftContainer.expandDiv > ul > li:nth-child(2) > a > span.catText
                    //->assertVisible('(//span[@class="catText"])[1]');
            $hoverelement = $browser->element('#container > div > div.q8WwEU > div > div > div > div > div.css-1dbjc4n.r-13awgt0 > div > div.css-1dbjc4n.r-13awgt0.r-1iqfa7g.r-60vfwk > div > div.yAlKeh > div._2L0uxW > div > div:nth-child(1) > div > div > div > div > div._3sdu8W.emupdz > div._1ch8e_._1mZ8pZ > div > div > span > span:nth-child(1)');
            $browser->mouseover($hoverelement);
            //$browser->waitFor('//span[text()="Sports Shoes"]');
            $browser->pause(5000);
            $browser->click('body > div._1UgUYI._2eN8ye > div._16rZTH > object > a._1BJVlg._11MZbx');  
            //#category1Data > div.leftData.colDataBlk > div > div > p:nth-child(2) > a > span  
        });
    }









}

