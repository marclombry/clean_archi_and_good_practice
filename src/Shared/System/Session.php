<?php
namespace Src\Shared\System;

class Session
{
    private array $session = [];

    public function set(string $key, $value): void
    {
        $this->session[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->session[$key] ?? null;
    }

    public function all(): array
    {
        return $this->session;
    }

    public function remove(string $key): void
    {
        unset($this->session[$key]);
    }

    public function clear(): void
    {
        $this->session = [];
    }
}
