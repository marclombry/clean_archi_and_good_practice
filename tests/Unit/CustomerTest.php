<?php

use Src\Domain\Model\Customer;

describe('customer information is good', function() {

    it('the customer have good properties', function() {
        $customer = new Customer('john', 'doe', 'john@doe.com', '0651222222');
        expect($customer)->toBeInstanceOf(Customer::class);
        expect($customer)->toHaveProperties(['firstname', 'lastname', 'email', 'phone',
            'address', 'city', 'postalCode', 'comment']);
    });
    /*
    it('user enter a good email', function() {
        $customer = new Customer('john', 'doe', 'john@doe.com', '0651222222');
        expect(filter_var(trim($customer->getEmail()), FILTER_VALIDATE_EMAIL))->toBe(trim($customer->getEmail()));
    });

    it('user enter availible phone number', function() {
        $customer = new Customer('john', 'doe', 'john@doe.com', '0651222222');
        expect($customer->getPhone())->toMatch('/^[+]?[0-9]+$/');
        expect(strlen($customer->getPhone()))->toBeLessThanOrEqual(12);
        expect(strlen($customer->getPhone()))->toBeGreaterThanOrEqual(10);
    });
    */
    /*
    it('user enter a wrong phone number', function(){
        $customer = new Customer('john', 'doe', 'johncom', '0651222222');
        if(!filter_var(trim($customer->getEmail()), FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('your phone number is incorrect');
        }
    })->throws(InvalidArgumentException::class);
    */
});


