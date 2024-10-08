<?php

namespace Src\Port\Presenter;

class IndexPresenter implements PresenterViewInterface
{
    private string $template ='index';

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return IndexPresenter
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