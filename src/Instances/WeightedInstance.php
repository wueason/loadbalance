<?php

namespace Wueason\LoadBalance;

class WeightedInstance extends BaseInstance
{
    public $weight;

    function __construct($name, $weight)
    {
        parent::__construct($name);
        $this->weight = $weight;
    }
}