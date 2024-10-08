<?php
namespace Src\Port\Auth;

interface AuthenticateInterface
{

    public function login(array $informations): bool;

    public function logout(): bool;

    public function getHashedPasswordByEmail(string $email);
}