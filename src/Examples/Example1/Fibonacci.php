<?php

namespace MutationTesting\Examples\Example1;

class Fibonacci
{
    /**
     * @param int $n
     *
     * @return int
     */
    public function fibonacci(int $n = 0): int
    {
        return ($n === 0 || $n === 1) ? $n : $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
    }
}
