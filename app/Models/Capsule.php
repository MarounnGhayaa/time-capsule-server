<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capsule extends Model {
    
    use HasFactory;

    public function capsuleAuthor() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected $fillable =
        ['user_id',
        'title',
        'message',
        'privacy',
        'unlisted_token',
        'longitude',
        'latitude',
        'ip_address',
        'country',
        'is_surprise',
        'image_path',
        'audio_path',
        'cover_image',
        'reveal_at',
        'mood',
        'emoji',
        'color',];

}
