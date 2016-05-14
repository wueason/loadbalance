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
        $pool = array_map(function($a){
            return new BaseInstance($a);
        }, ['A','B','C']);
        $c = new RoundRobinEngine($pool);

        $this->assertInstanceOf('Wueason\\LoadBalance\\RoundRobinEngine', $c);
        $this->assertContains($c->pick(), $pool);

        return $c;
    }
}
