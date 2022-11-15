<?php

namespace MutationTesting\Examples;

use MutationTesting\Examples\Example1\Fibonacci;
use PHPUnit\Framework\TestCase;

/**
 * @group Example1
 * @group Fibonacci
 */
class FibonacciTest extends TestCase
{
    /**
     * @group Test1
     * @group Test2
     * @group Test3
     * @group Test4
     *
     * @covers \MutationTesting\Examples\Example1\Fibonacci
     *
     * @return void
     */
    public function testFibonacciWithoutArgumentUsesDefaultValue(): void
    {
        $fibonacci = new Fibonacci();

        $this->assertSame(0, $fibonacci->fibonacci());
    }

    /**
     * @group Test2
     * @group Test3
     * @group Test4
     *
     * @covers \MutationTesting\Examples\Example1\Fibonacci
     *
     * @return void
     */
    public function testFibonacciWith0ShouldReturnInputValue(): void
    {
        $fibonacci = new Fibonacci();

        $this->assertSame(0, $fibonacci->fibonacci(0));
    }

    /**
     * @group Test3
     * @group Test4
     *
     * @covers \MutationTesting\Examples\Example1\Fibonacci
     *
     * @return void
     */
    public function testFibonacciWith1ShouldReturnInputValue(): void
    {
        $fibonacci = new Fibonacci();

        $this->assertSame(1, $fibonacci->fibonacci(1));
    }

    /**
     * @group Test4
     *
     * @covers \MutationTesting\Examples\Example1\Fibonacci
     *
     * @return void
     */
    public function testFibonacciWithAnyOtherNumberThan0Or1ShouldSumTheTwoPrecedingOnes(): void
    {
        $fibonacci = new Fibonacci();

        $this->assertSame(3, $fibonacci->fibonacci(4));
    }
}
