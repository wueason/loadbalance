<?php

namespace Wueason\LoadBalance;

class WeightedRoundRobinEngine extends RoundRobinEngine
{
    /*
     * New pool after rebuilding.
     */
    private $_newPool = [];

    function __construct(array $pool)
    {
        if (empty($pool)) {
            throw new InvalidArgumentException('$pool must not be empty.');
        }

        if (!is_array($pool)) {
            throw new InvalidArgumentException('$pool must be an array.');
        }

        usort($pool, function ($left, $right) {
            return $left->weight > $right->weight ? 1 : -1;
        });

        foreach ($pool as $instance) {
            for ($i = 0; $i < $instance->weight; $i++) {
                array_push($this->_newPool, $instance);
            }
        }

        parent::__construct($this->_newPool);
    }

}