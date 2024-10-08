<?php

namespace Src\Port\Presenter;

interface PresenterViewInterface
{
    public function view(string $template);
    public function getTemplate();
}