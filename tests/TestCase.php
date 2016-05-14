<?php

namespace Tests;

class TestCase extends \PHPUnit_Framework_TestCase
{
    function __construct()
    {
        require __DIR__.'/../vendor/autoload.php';
        parent::__construct();
    }
}