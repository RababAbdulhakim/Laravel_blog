<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Comments";
    public $fillable = ['user_id','posts_id','Comment','username'];
      	public function comments()
    {
        return $this->belongsTo('Posts');
    }
}
