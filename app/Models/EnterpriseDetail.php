<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise_id',
        'filename',
        'title',
        'description'
    ];
}
