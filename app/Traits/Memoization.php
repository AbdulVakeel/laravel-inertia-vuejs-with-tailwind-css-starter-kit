<?php

namespace App\Traits;

trait Memoization
{
    /**
     * Cache store
     */
    protected array $cacheStore = [];

    /**
     * Cache store
     */
    protected static array $staticCacheStore = [];

    /**
     * Cache value
     */
    protected function memo(string $key, callable $callback): mixed
    {
        if (!array_key_exists($key, $this->cacheStore)) {
            $this->cacheStore[$key] = $callback();
        }

        return $this->cacheStore[$key];
    }

    /**
     * Cache value
     */
    protected static function staticMemo(string $key, callable $callback): mixed
    {
        if (!array_key_exists($key, static::$staticCacheStore)) {
            static::$staticCacheStore[$key] = $callback();
        }

        return static::$staticCacheStore[$key];
    }
}
