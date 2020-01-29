<?php

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    /** @test */
    public function true_asserts_to_true()
    {
        $this->assertTrue(true);
    }
}