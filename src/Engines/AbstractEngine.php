<?php

namespace Wueason\LoadBalance;

abstract class AbstractEngine
{
    /*
     * Pool to store server instances.
     */
    protected $pool;

    function __construct(array $pool)
    {
        if (empty($pool)) {
            throw new InvalidArgumentException('$pool must not be empty.');
        }

        if (!is_array($pool)) {
            throw new InvalidArgumentException('$pool must be an array.');
        }

        foreach($pool as $instance) {
            if(!($instance instanceof BaseInstance)) {
                throw new InvalidArgumentException('element must be instance of BaseInstance.');
            }
        }

        $this->pool = $pool;
    }


}