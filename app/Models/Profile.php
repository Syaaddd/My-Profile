<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'profession',
        'description',
        'address',
        'phone',
        'github_url',
        'linkedin_url',
        'website_url',
        'cv_path',
        'avatar_path',
        'meta_title',
        'meta_description',
    ];

    // Accessor untuk avatar URL
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar_path) {
            return asset('storage/' . $this->avatar_path);
        }
        return asset('images/default-avatar.png');
    }

    // Accessor untuk CV URL
    public function getCvUrlAttribute()
    {
        if ($this->cv_path) {
            return asset('storage/' . $this->cv_path);
        }
        return null;
    }
}