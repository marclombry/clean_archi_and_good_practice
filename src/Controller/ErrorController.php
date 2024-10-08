<?php

namespace Src\Controller;

use Src\Domain\UseCase\IndexUseCase;
use Src\Port\Presenter\PresenterViewInterface;

class ErrorController
{
    public function __construct(private PresenterViewInterface $presenterView){}
    public function index()
    {
        return $this->presenterView->view('Error/error404');
    }
}