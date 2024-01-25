<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'description', 'image'];
    public function subCatalogs(){
        return $this->hasMany(SubCatalog::class);
    }
}
