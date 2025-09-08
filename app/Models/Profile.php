<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'logo_image',
        'logo_text',
        'welcome_title',
        'latar_belakang',
        'deskripsi_usaha',
        'welcome_text',
        'welcome_image',
        'visi',
        'misi',
        'prinsip',
        'team_image',
        'map_embed_url',
        'location_address',
        'email_address',
        'social_link',
        'whatsapp_number',
    ];
}
