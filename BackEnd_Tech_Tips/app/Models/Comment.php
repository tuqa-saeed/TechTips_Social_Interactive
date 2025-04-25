<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Comment.php

class Comment extends Model
{
    protected $fillable = ['advice_id', 'user_id', 'content'];

    public function advice()
    {
        return $this->belongsTo(Advice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
