<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Like.php

class Like extends Model
{
    protected $fillable = ['advice_id', 'user_id'];

    public function advice()
    {
        return $this->belongsTo(Advice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

