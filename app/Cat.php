<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function getData()
    {
        return '名前：'.$this ->name;
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
