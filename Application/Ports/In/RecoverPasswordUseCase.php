<?php

interface RecoverPasswordUseCase
{
    public function execute(RecoverPasswordCommand $command);
}