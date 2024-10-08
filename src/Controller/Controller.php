<?php

namespace Src\Controller;


class Controller
{
    protected string $uri;

    protected string $path;

    public function __construct()
    {
        $this->path = dirname(__DIR__);
    }
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Controller
     */
    public function setPath(string $path): Controller
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return Controller
     */
    public function setUri(string $uri): Controller
    {
        $this->uri = $uri;
        return $this;
    }


    public function get(string $uri, $useCase)
    {
        //TODO create action for this controller
        return $useCase;
    }

    public function post(string $uri, array $data): void
    {
        //TODO Post method
    }

    public function getResponse()
    {
        $headers = get_headers($this->getUri());
        if (!$headers) {
            header("HTTP/1.0 404 Not Found");
            throw new \Exception('Not Found');
        }
        return substr($headers[0], 9, 3);
    }

}