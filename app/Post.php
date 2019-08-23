<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function scopeSearch($query, $request)
    {
        foreach ($request->all() as $column => $text) {
            if ($column !== 'page' && $request->filled($column)) {
                $query->where($column, 'like', '%'.$text.'%');
            }
        }
        return $query;
    }
}
