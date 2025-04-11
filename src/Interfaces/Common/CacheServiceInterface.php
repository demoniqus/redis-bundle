<?php

interface CacheServiceInterface
{
    public function put($key, $value, ?array $options = []): CacheServiceInterface;

    public function get(string $key);

    /**
     * Здесь можно проверять, существует ли такой ключ как непосредственно в хранилище, так и в памяти данного сервиса
     */
    public function has(string $key): bool;

}
