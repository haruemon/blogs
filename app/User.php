<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
         'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var  array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getPrimaryKey()
    {
        return $this->primaryKey;
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
