<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hobby extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'user_id'
    ];
}
