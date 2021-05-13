<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprises extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'filename',
        'title_project',
        'description',
        'googlemaps',
        'link_video',
        'slug',
    ];
}
