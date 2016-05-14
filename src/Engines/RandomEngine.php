<?php

namespace Wueason\LoadBalance;

class RandomEngine extends AbstractEngine
{
    /*
     * Pick a server instance from pool.
     */
    function pick()
    {
        if(empty($this->pool))
        {
            return null;
        }
        return $this->pool[rand(0, count($this->pool) - 1)];
    }

}