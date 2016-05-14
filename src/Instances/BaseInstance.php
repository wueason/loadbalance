<?php

namespace Wueason\LoadBalance;

class BaseInstance
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}