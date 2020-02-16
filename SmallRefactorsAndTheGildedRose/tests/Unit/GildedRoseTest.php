<?php

namespace Tests\Unit;

use App\GildedRose;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GildedRoseTest extends TestCase
{

    /** @test */
    function updates_normal_items_before_sell_date()
    {
        $item = GildedRose::of('normal', 10, 5); // quality, sell in X days

        $item->tick();

        $this->assertEquals(9, $item->quality);
        $this->assertEquals(4, $item->sellIn);
    }

    /** @test */
    function updates_normal_items_on_the_sell_date()
    {
        $item = GildedRose::of('normal', 10, 0); // quality, sell in X days

        $item->tick();

        $this->assertEquals(8, $item->quality);
        $this->assertEquals(-1, $item->sellIn);
    }

    /** @test */
    function updates_normal_items_after_the_sell_date()
    {
        $item = GildedRose::of('normal', 10, -5); // quality, sell in X days

        $item->tick();

        $this->assertEquals(8, $item->quality);
        $this->assertEquals(-6, $item->sellIn);
    }

    /** @test */
    function updates_normal_items_with_a_quality_of_0()
    {
        $item = GildedRose::of('normal', 0, 5); // quality, sell in X days

        $item->tick();

        $this->assertEquals(0, $item->quality);
        $this->assertEquals(4, $item->sellIn);
    }

    /** @test */
    function updates_brie_items_before_the_sell_date()
    {
        $item = GildedRose::of('Aged Brie', 10, 5); // quality, sell in X days

        $item->tick();

        $this->assertEquals(11, $item->quality);
        $this->assertEquals(4, $item->sellIn);
    }

    /** @test */
    function updates_brie_items_before_the_sell_with_maximum_quality()
    {
        $item = GildedRose::of('Aged Brie', 50, 5); // quality, sell in X days

        $item->tick();

        $this->assertEquals(50, $item->quality);
        $this->assertEquals(4, $item->sellIn);
    }

    /** @test */
    function updates_brie_items_on_the_sell_date()
    {
        $item = GildedRose::of('Aged Brie', 10, 0); // quality, sell in X days

        $item->tick();

        $this->assertEquals(12, $item->quality);
        $this->assertEquals(-1, $item->sellIn);
    }

    /** @test */
    function updates_backstage_pass_items_long_before_the_sell_date()
    {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 11); // quality, sell in X days

        $item->tick();

        $this->assertEquals(11, $item->quality);
        $this->assertEquals(10, $item->sellIn);
    }

    /** @test */
    function updates_backstage_pass_items_close_to_the_sell_date()
    {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 10); // quality, sell in X days

        $item->tick();

        $this->assertEquals(12, $item->quality);
        $this->assertEquals(9, $item->sellIn);
    }

    /** @test */
    function updates_backstage_pass_items_close_to_the_sell_data_at_max_quality()
    {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 10); // quality, sell in X days

        $item->tick();

        $this->assertEquals(50, $item->quality);
        $this->assertEquals(9, $item->sellIn);
    }

    /** @test */
    function updates_backstage_pass_items_very_close_to_the_sell_date()
    {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 5); // quality, sell in X days

        $item->tick();

        $this->assertEquals(13, $item->quality);
        $this->assertEquals(4, $item->sellIn);
    }

    /** @test */
    function updates_backstage_pass_items_on_the_sell_date()
    {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 0); // quality, sell in X days

        $item->tick();

        $this->assertEquals(0, $item->quality);
        $this->assertEquals(-1, $item->sellIn);
    }

    /** @test */
    function updates_conjured_items_before_the_sell_date()
    {
        $item = GildedRose::of('Conjured Mana Cake', 10, 10); // quality, sell in X days

        $item->tick();

        $this->assertEquals(8, $item->quality);
        $this->assertEquals(9, $item->sellIn);
    }

    /** @test */
    function updates_conjured_items_at_zero_quality()
    {
        $item = GildedRose::of('Conjured Mana Cake', 0, 10); // quality, sell in X days

        $item->tick();

        $this->assertEquals(0, $item->quality);
        $this->assertEquals(9, $item->sellIn);
    }

    /** @test */
    function updates_conjured_items_on_the_sell_date()
    {
        $item = GildedRose::of('Conjured Mana Cake', 10, 0); // quality, sell in X days

        $item->tick();

        $this->assertEquals(6, $item->quality);
        $this->assertEquals(-1, $item->sellIn);
    }
}
