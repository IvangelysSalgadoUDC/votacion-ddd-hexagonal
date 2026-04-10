<?php

interface GetVotacionByIdPort
{
    public function findById(int $id): ?Votacion;
}