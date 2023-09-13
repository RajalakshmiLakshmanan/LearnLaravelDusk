<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LearnWebTableTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.chittorgarh.com/')
                    ->assertSee('SME IPO 2023 List')
                    ->pause(5000);
            $table = $browser->elements('(//table[@class= "table table-sm table-striped"])[2]/tbody/tr');
           // $rows = $table->rows();//#main > div:nth-child(4) > div:nth-child(2) > div > div.card-body > table > tbody
            //$numrows = $rows->count();
            $numrows = count($table);
            echo " number of rows in table: $numrows";      
        });
    }

    public function testleafgroundtable()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.leafground.com/table.xhtml')
                    ->assertSee('Customer Analytics Table')
                    //->pause(5000);
                    ->waitFor('.ui-datatable-scrollable-body', 10); 
            $table = $browser->elements('#form\:j_idt89_data > tr:nth-child(1)');
            $numrows = count($table);   
            echo " number of rows in table: $numrows";  
            foreach ($table as $row) {
                $cells = $row->elements('#form\:j_idt89_data > tr:nth-child(1) > td:nth-child(1)');
                foreach ($cells as $cell) {
                    echo $cell->getText() . ' | ';
                }
             
               echo "\n";    
            }
            
            $table1 = $browser->element('#form\:j_idt89 > div.ui-datatable-scrollable-body > table');
            $tableContent = $table1->getText();
            echo "$tableContent";
        });
    }

    public function testTable()
    {
    $this->browse(function (Browser $browser) {
        $browser->visit('https://www.leafground.com/table.xhtml')
                ->assertSee('Customer Analytics Table')
                ->waitFor('.ui-datatable-scrollable-body', 10); 
        $rows = $browser->elements('#form\:j_idt89_data > tr');
        $numrows = count($rows);   
        echo " number of rows in table: $numrows";  
        foreach ($rows as $row) {
            $cells = $row->findElements(WebDriverBy::tagName('td'));
            foreach ($cells as $cell) {
                echo $cell->getText() . ' | ';
            }
         
           echo "\n";    
        }
    });
}



}
