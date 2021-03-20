<?php

namespace App\Models;

use App\Models\Contracts\AuditAwareInterface;
use App\Models\Contracts\ImageAwareInterface;
use App\Models\Contracts\SoftDeletableInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements
    ImageAwareInterface, AuditAwareInterface, SoftDeletableInterface,
    Authenticatable
{
    use \Illuminate\Auth\Authenticatable, AuditAwareTrait, ImageAwareTrait, SoftDeletable;
}
