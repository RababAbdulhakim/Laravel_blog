<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "Category";
    public $fillable = ['Category','description'];
    public function SubCategories()
{
    return $this->hasMany('\App\SubCategory');
}
}
