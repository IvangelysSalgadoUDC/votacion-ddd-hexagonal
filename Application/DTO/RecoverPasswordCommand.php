<?php

class RecoverPasswordCommand
{
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }
}