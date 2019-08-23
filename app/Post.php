<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'user_id', 'title', 'status', 'body', 'published_at',
    ];

    protected $dates = ['published_at'];

    const DRAFT = 1;
    const PUBLISHED = 1;

    protected $statusLabels = [
        self::DRAFT => '下書き',
        self::PUBLISHED => '公開',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
