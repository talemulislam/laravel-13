<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CacheTest extends TestCase
{
    /**
     * A basic functional test example.
     */
    public function test_basic_example(): void
    {
        Cache::shouldReceive('get')
            ->with('key')
            ->andReturn('value');

        $response = $this->get('/cache');

        $response->assertSee('value');
    }
}