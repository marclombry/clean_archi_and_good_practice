<?php

namespace Src\Config;

class DatabaseConfig
{
    private $env;

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     * @return DatabaseConfig
     */
    public function setEnv($env)
    {
        $this->env = $env;
        return $this;
    }

    public function getConfig()
    {
        $env = require realpath(__DIR__.'../../../').'/'.$this->getEnv();

        return [
            'host' => $env['host'] ?? 'localhost',
            'dbname' => $env['dbname'] ?? 'appointments',
            'username' => $env['username'] ?? 'root',
            'password' => $env['password'] ?? '',
            'port' => $env['port'] ?? '3306',
        ];
    }
}
