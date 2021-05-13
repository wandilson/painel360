<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_project',
        'link_facebook',
        'link_instagram',
        'link_youtube',
        'link_linkedin',
        'link_whatsapp',
        'iframe_googlemaps',
        'phone_fixo',
        'phone_cell',
        'address'
    ];
}
