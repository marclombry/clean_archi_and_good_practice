<?php
namespace Src\Domain\Model;

use Src\Port\Auth\AuthenticateInterface;

class UserServices
{
    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

}