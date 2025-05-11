<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Gallery;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
}


