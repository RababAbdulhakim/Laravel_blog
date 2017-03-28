<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = "Posts";
    public $fillable = ['title','description','image','author' , 'sub_category_id'];
    public function comments()
    {
return $this->hasMany('App\Comment');
        }
        
         public function SubCat()
    {
return $this->belongsTo('App\SubCategory');
        }
        
}
