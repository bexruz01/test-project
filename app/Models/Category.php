<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['sub_catalog_id', 'code', 'name', 'description', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
