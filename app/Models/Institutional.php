<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institutional extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
        'filename',
        'link_video',
        'description'
    ];
}
