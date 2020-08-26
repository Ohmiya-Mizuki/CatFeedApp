<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedRecord extends Model
{
    protected $guarded = ["id", "token"];
    public function cats()
    {
        return $this->belongsTo(Cat::class);
    }
}
