<?php

interface GetAllVotacionesUseCase
{
    public function execute(GetAllVotacionesQuery $query): array;
}