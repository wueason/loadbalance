<?php

namespace Tests;

use Wueason\LoadBalance\WeightedInstance;
use Wueason\LoadBalance\WeightedRoundRobinEngine;
use Wueason\LoadBalance\InvalidArgumentException;

require_once 'TestCase.php';

class WeightedRoundRobinEngineTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCanBeConstructedFromEmptyArray()
    {
        new WeightedRoundRobinEngine([]);
    }

    public function testCanBeConstructedFromFilledArray()
    {
        $pool = array_map(function($instance){
            return new WeightedInstance($instance['name'], $instance['weight']);
        }, [['name'=>'A', 'weight'=>5],
            ['name'=>'B', 'weight'=>4],
            ['name'=>'B', 'weight'=>3]]);

        $lb = new WeightedRoundRobinEngine($pool);

        $this->assertInstanceOf('Wueason\\LoadBalance\\WeightedRoundRobinEngine', $lb);
        $this->assertContains($lb->pick(), $pool);

        return $lb;
    }
}
