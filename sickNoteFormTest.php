<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class sickNoteFormTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit('https://cookie.siliconpreview.co.uk/')
            ->assertSee('Cookie')
            ->clickLink('Reception')
            ->clickLink('Sick / fit notes')
            ->pause(2000)
            ->clickLink('I have already had a Sick / Fit Note for this illness')
            ->type('patient_firstnames','Lara')
            ->type('patient_lastname','David')
            ->type('patient_postcode','PO16 7GZ')
            ->type('patient_dobd','16')
            ->type('patient_dobm','12')
            ->type('patient_doby','1985')
            ->pause(2000)
            ->clickAtXPath('//label[@for="female"]')
            ->type('contact_phone','07911 123456')
            ->type('contact_email','rajalakshmi.laksh@gmail.com')
           // ->radio('item_meta[preferred_contact]','email')
           ->clickAtXpath('//label[@for="email"]')
            ->type('item_meta[384]','03/08/2023')
            ->type('item_meta[1110]','7')
            ->type('item_meta[386]','question')
            ->press('Submit')
            ->click('#review-info > div > label')
            ->press('Yes, it')
            ->pause(3000)
            ->assertSee('Thank you');
        });
            
}





}