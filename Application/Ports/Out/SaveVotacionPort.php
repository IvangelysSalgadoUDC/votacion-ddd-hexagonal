<?php

interface SaveVotacionPort
{
    public function save(Votacion $votacion): Votacion;
}