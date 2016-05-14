<?php

namespace Wueason\LoadBalance;

class RoundRobinEngine extends AbstractEngine
{
    /*
     * Current roundrobin index.
     */
    protected $currentIndex = 0;

    /*
     * Instances size of the Pool.
     */
    protected $poolSize;

    function __construct(array $pool)
    {
        parent::__construct($pool);
        $this->poolSize = count($pool);
    }

    /*
     * Pick a server instance from the Pool.
     */
    function pick()
    {
        if(empty($this->pool))
        {
            return null;
        }
        $picked = $this->currentIndex++;
        $this->currentIndex = $this->currentIndex % $this->poolSize;
        return $this->pool[$picked];
    }

}