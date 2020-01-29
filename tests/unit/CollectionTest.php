<?php

use PHPUnit\Framework\TestCase;
use \App\Support\Collection;

class CollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct()
    {
        $collection = new Collection([
            'one',
            'two',
            'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'one',
            'two',
            'three'
        ]);

        $this->assertEquals('one', $collection->get()[0]);
        $this->assertEquals('two', $collection->get()[1]);
        $this->assertEquals('three', $collection->get()[2]);
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new Collection([
            'one',
            'two',
            'three'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());

    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection(['one', 'two']);
        $collection2 = new Collection(['three', 'four']);

        $collection1->merge($collection2);

        $this->assertCount(4, $collection1);
    }

    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new Collection(['one', 'two']);
        $collection->add(['fifteen']);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */

    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            ['username' => 'nina'],
            ['username' => 'maarten']
        ]);

        $this->assertEquals('[{"username":"nina"},{"username":"maarten"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new Collection([
            ['username' => 'nina'],
            ['username' => 'maarten']
        ]);

        $encoded = json_encode($collection->get());

        $this->assertEquals($encoded, $collection->toJson());
    }
}