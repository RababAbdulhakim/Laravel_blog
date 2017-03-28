<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts_SubCategory extends Model
{
    //
     protected $table = "SubCategoryPosts";
    public $fillable = ['sub_cat_id' ,'post_id'];
}
