<?php


use PHPUnit\Framework\TestCase;

class IntegerGeneratorTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_normal_generation(): void
    {
        $gen = new \App\DataGenerators\IntegerGenerator(0, 10, 5);
        //#1
        $this->assertTrue(is_int($gen->getCurrent()));
        $this->assertTrue($gen->getCurrent() >= 0);
        $this->assertTrue($gen->getCurrent() <= 10);
        $this->assertTrue($gen->hasNext());
        //#2
        $this->assertTrue(is_int($gen->getNext()));
        $this->assertTrue($gen->getCurrent() >= 0);
        $this->assertTrue($gen->getCurrent() <= 10);
        $this->assertTrue($gen->hasNext());
        //#3
        $this->assertTrue(is_int($gen->getNext()));
        $this->assertTrue($gen->getCurrent() >= 0);
        $this->assertTrue($gen->getCurrent() <= 10);
        $this->assertTrue($gen->hasNext());
        //#4
        $this->assertTrue(is_int($gen->getNext()));
        $this->assertTrue($gen->getCurrent() >= 0);
        $this->assertTrue($gen->getCurrent() <= 10);
        $this->assertTrue($gen->hasNext());
        //#5
        $this->assertTrue(is_int($gen->getNext()));
        $this->assertTrue($gen->getCurrent() >= 0);
        $this->assertTrue($gen->getCurrent() <= 10);
        $this->assertFalse($gen->hasNext());
    }

    public function test_one_number_generation(): void
    {
        $gen = new \App\DataGenerators\IntegerGenerator(5, 5, 3);
        //#1
        $this->assertTrue(is_int($gen->getCurrent()));
        $this->assertTrue($gen->getCurrent() == 5);
        $this->assertTrue($gen->hasNext());
        //#2
        $this->assertTrue(is_int($gen->getNext()));
        $this->assertTrue($gen->getCurrent() == 5);
        $this->assertTrue($gen->hasNext());
        //#3
        $this->assertTrue(is_int($gen->getNext()));
        $this->assertTrue($gen->getCurrent() == 5);
        $this->assertFalse($gen->hasNext());
    }
    public function test_zero_amount_generation(): void
    {
        $gen = new \App\DataGenerators\IntegerGenerator(5, 5, 0);
        //#1
        $this->assertTrue($gen->getCurrent() == null);
        $this->assertFalse($gen->hasNext());
    }
}
