<?php

namespace Tests;

use Wueason\LoadBalance\BaseInstance;
use Wueason\LoadBalance\RandomEngine;
use Wueason\LoadBalance\InvalidArgumentException;

require_once 'TestCase.php';

class RandomEngineTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCanBeConstructedFromEmptyArray()
    {
            new RandomEngine([]);
    }

    public function testCanBeConstructedFromFilledArray()
    {
        $pool = array_map(function($instance){
            return new BaseInstance($instance);
        }, ['A','B','C']);

        $lb = new RandomEngine($pool);

        $this->assertInstanceOf('Wueason\\LoadBalance\\RandomEngine', $lb);
        $this->assertContains($lb->pick(), $pool);

        return $lb;
    }
}
