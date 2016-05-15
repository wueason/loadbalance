<?php

namespace Tests;

use Wueason\LoadBalance\BaseInstance;
use Wueason\LoadBalance\RoundRobinEngine;
use Wueason\LoadBalance\InvalidArgumentException;

require_once 'TestCase.php';

class RoundRobinEngineTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCanBeConstructedFromEmptyArray()
    {
        new RoundRobinEngine([]);
    }

    public function testCanBeConstructedFromFilledArray()
    {
        $pool = array_map(function($instance){
            return new BaseInstance($instance);
        }, ['A','B','C']);

        $lb = new RoundRobinEngine($pool);

        $this->assertInstanceOf('Wueason\\LoadBalance\\RoundRobinEngine', $lb);
        $this->assertContains($lb->pick(), $pool);

        return $lb;
    }
}
