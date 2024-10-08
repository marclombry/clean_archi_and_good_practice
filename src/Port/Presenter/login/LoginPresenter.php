<?php

namespace Src\Port\Presenter\Login;

use Src\Port\Presenter\PresenterViewInterface;

class LoginPresenter implements PresenterViewInterface
{
    public function __construct(protected $useCase, protected $template){}

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return LoginPresenter
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