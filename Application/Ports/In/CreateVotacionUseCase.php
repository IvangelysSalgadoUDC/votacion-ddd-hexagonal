<?php

interface CreateVotacionUseCase
{
    public function execute(CreateVotacionCommand $command): Votacion;
}