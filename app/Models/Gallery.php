<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'filename', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }
}

