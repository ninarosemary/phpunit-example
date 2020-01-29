<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Addition extends OperationAbstract implements IOperation
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }

        return array_sum($this->operands);
    }
}