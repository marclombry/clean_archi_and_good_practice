<?php

namespace Src\Controller;

use Src\Domain\UseCase\IndexUseCase;
use Src\Port\Presenter\PresenterViewInterface;

class IndexController
{
    public function __construct(private IndexUseCase $indexUseCase, private PresenterViewInterface $presenterView){}

    public function index()
    {
        return $this->presenterView->view('index');
    }
}