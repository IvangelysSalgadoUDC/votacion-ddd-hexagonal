<?php

interface LoginUserUseCase
{
    public function execute(LoginUserCommand $command);
}