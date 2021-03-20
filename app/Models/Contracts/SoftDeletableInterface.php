<?php


namespace App\Models\Contracts;


interface SoftDeletableInterface
{
    public function canSoftDelete();
}
