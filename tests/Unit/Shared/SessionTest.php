<?php

use PHPUnit\Framework\TestCase;
use Src\Shared\System\Session;

class SessionTest extends TestCase
{
    private function generateSession() {
        session_start();
        $session = new Session();
        $session->set('test', 'value_test');
        return $session->get('test');
    }

    public function test_if_session_exist()
    {
        $session = $this->generateSession() !== null;
        $this->assertTrue($session);
    }

    public function test_clear_session()
    {
        $session = new Session();
        $session->clear();
        $this->assertSame([],$session->all());
    }

}