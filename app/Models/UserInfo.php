<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $imagePath = ($this->profile_image) ? $this->profile_image : 'avatar/class_diagram.png';

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsTo(User::class);
    }
}
