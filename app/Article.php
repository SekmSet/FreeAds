<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function themes()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
