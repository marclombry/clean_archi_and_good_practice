<?php

namespace Src\Port\Presenter\Error;

use Src\Port\Presenter\PresenterViewInterface;

class ErrorPresenter implements PresenterViewInterface
{

    protected mixed $template = 'Error/error404';

    /**
     * @return mixed
     */
    public function getTemplate(): mixed
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return ErrorPresenter
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
        return $this;
    }

    public function view(string $template ='')
    {
        $path = 'src/UI/Template/'.$this->getTemplate().'.view.php';
        if(!file_exists($path))
        {
            throw new \Exception("template not exist",404);
        }
        include_once $path;
    }
}