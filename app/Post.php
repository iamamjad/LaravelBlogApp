<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function  scopeFilter($query,array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags','like','%'.request('tag'). '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title','like','%'.request('search'). '%')
                ->orwhere('description','like','%'.request('search'). '%')
                ->orwhere('tags','like','%'.request('search'). '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
