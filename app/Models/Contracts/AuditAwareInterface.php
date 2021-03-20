<?php


namespace App\Models\Contracts;


interface AuditAwareInterface
{
    public function getAudit();
}
