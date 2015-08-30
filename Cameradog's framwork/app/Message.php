<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name','content','time'];

    protected $table = 'all_message';

    public function owner(){
        return $this->belongsTo('App\User');
    }
}
