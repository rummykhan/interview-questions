<?php

namespace App\Models;

use App\Models\Contracts\AuditAwareInterface;
use Illuminate\Database\Eloquent\Model;

class FileLog extends Model implements AuditAwareInterface
{
    use AuditAwareTrait;
}
