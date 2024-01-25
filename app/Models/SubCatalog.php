<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class SubCatalog extends Model
{
    protected $table = 'sub_catalog';
    protected $fillable = ['code','catalog_id', 'name', 'description', 'image'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function catalog(){
        return $this->belongsTo(Catalog::class);
    }
}
