<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $guarded = ["id", "token"];

    public function getData()
    {
        return '名前：' . $this->name;
    }

    public function getGenderStrAttribute(): string
    {
        if ($this->gender == 1) return "オス";
        if ($this->gender == 2) return "メス";
        return "その他";
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
