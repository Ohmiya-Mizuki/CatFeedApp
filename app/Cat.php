<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $guarded = ["id", "token"];

    protected $dates = [
        'food_time'
    ];

    public function getData()
    {
        return '名前：' . $this->name;
    }

    public function getGenderStrAttribute(): string
    {
        $genderList = [
            1 => 'オス',
            2 => 'メス'
        ];
        return (isset($genderList[$this->gender])) ? $genderList[$this->gender] : 'その他';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feed_records()
    {
        return $this->hasMany(FeedRecord::class);
    }
}
