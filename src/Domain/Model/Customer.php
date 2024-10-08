<?php

namespace Src\Domain\Model;

use http\Exception\InvalidArgumentException;

class Customer
{
    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string|null $address
     * @param string|null $city
     * @param string|null $postalCode
     * @param string|null $comment
     */
    public function __construct(
        private string $firstname,private string $lastname, private string $email, private string $phone,
        private ?string $address = null, private ?string $city = null,
        private ?string $postalCode = null, private ?string $comment = null
    ){}

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Customer
     */
    public function setFirstname(string $firstname): Customer
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Customer
     */
    public function setLastname(string $lastname): Customer
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        if(filter_var(trim($this->getEmail()), FILTER_VALIDATE_EMAIL))
        {
            return $this->email;
        }
        throw new InvalidArgumentException('your email is incorrect');

    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Customer
     */
    public function setPhone(string $phone): Customer
    {
        if(trim(strlen($phone))>=10 && trim(strlen($phone))<=13 ) {
            $this->phone = $phone;
            return $this;
        }
        throw new InvalidArgumentException('your phone number is incorrect');

    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return Customer
     */
    public function setAddress(?string $address): Customer
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Customer
     */
    public function setCity(?string $city): Customer
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     * @return Customer
     */
    public function setPostalCode(?string $postalCode): Customer
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return Customer
     */
    public function setComment(?string $comment): Customer
    {
        $this->comment = $comment;
        return $this;
    }
}