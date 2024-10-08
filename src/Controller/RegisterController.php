<?php

namespace Src\Controller;
use Src\Domain\UseCase\UserServicesUseCase;
use Src\Port\Presenter\PresenterViewInterface;

class RegisterController
{
    public function __construct(
        private UserServicesUseCase $userServicesUseCase,
        private PresenterViewInterface $presenter)
    {}

    public function register()
    {
        $this->presenter->view('Register/register');
    }
}