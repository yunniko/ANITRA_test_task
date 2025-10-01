<?php


use PHPUnit\Framework\TestCase;

class DuplicateFinderTest extends TestCase
{
    public function test_empty(): void
    {
        $data = new DataGenerator([]);
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();
        $this->assertEmpty($duplicateFinder->processData($data));
    }
    public function test_no_duplicates(): void
    {
        $data = new DataGenerator([1,2,3,4,5,6]);
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();
        $this->assertEmpty($duplicateFinder->processData($data));
    }
    public function test_one_item(): void
    {
        $data = new DataGenerator([6]);
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();
        $this->assertEmpty($duplicateFinder->processData($data));
    }

    public function test_duplicates(): void
    {
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();

        $data = new DataGenerator([1,1,2,3,4,5,5,5,6]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(1, $result);
        $this->assertArrayHasKey(5, $result);
        $this->assertArrayNotHasKey(2, $result);
        $this->assertArrayNotHasKey(3, $result);
        $this->assertArrayNotHasKey(4, $result);
        $this->assertArrayNotHasKey(6, $result);
        $this->assertEquals(2, $result[1]);
        $this->assertEquals(3, $result[5]);


        $data = new DataGenerator([1,2,1,3,5,4,5,6,5]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(1, $result);
        $this->assertArrayHasKey(5, $result);
        $this->assertArrayNotHasKey(2, $result);
        $this->assertArrayNotHasKey(3, $result);
        $this->assertArrayNotHasKey(4, $result);
        $this->assertArrayNotHasKey(6, $result);
        $this->assertEquals(2, $result[1]);
        $this->assertEquals(3, $result[5]);

        $data = new DataGenerator([6,5,5,5,4,3,2,1,1]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(1, $result);
        $this->assertArrayHasKey(5, $result);
        $this->assertArrayNotHasKey(2, $result);
        $this->assertArrayNotHasKey(3, $result);
        $this->assertArrayNotHasKey(4, $result);
        $this->assertArrayNotHasKey(6, $result);
        $this->assertEquals(2, $result[1]);
        $this->assertEquals(3, $result[5]);
    }
    public function test_all_duplicates(): void
    {
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();
        $data = new DataGenerator([7,7,7,7,7]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(7, $result);
        $this->assertEquals(5, $result[7]);

        $data = new DataGenerator([117,117]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(117, $result);
        $this->assertEquals(2, $result[117]);
    }

    public function test_duplicates_of_zero(): void {
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();
        $data = new DataGenerator([0,0,0]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(0, $result);
        $this->assertEquals(3, $result[0]);
    }

    public function test_duplicates_of_negative(): void {
        $duplicateFinder = new \App\DataProcessors\DuplicateFinder();
        $data = new DataGenerator([-90,-90,-90]);
        $result = $duplicateFinder->processData($data);
        $this->assertArrayHasKey(-90, $result);
        $this->assertEquals(3, $result[-90]);
    }
}
class DataGenerator implements \App\Providers\IntegerProviderInterface
{
    private $i = 0;
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getNext(): ?int
    {
        If ($this->hasNext()) $this->i++;
        return ($this->getCurrent());
    }

    public function getCurrent(): ?int
    {
        return $this->data[$this->i] ?? null;
    }

    public function getIndex(): int
    {
        return $this->i;
    }

    public function hasNext(): bool
    {
        return (isset($this->data[$this->i]));
    }
}

