<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Rating.php

class Rating extends Model
{
    protected $fillable = ['advice_id', 'user_id', 'rating_value'];

    public function advice()
    {
        return $this->belongsTo(Advice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
