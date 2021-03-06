<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
        'name', 'color', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
