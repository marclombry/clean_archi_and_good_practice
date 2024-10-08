<?php

namespace Src\Adapter;

use Src\Port\Presenter\PresenterViewInterface;

class AdapterPresenter
{

    public function __construct(private PresenterViewInterface $presenterView){}

    public function view()
    {
        $this->presenterView->view($this->presenterView->getTemplate());
    }
}