<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'reference',
        'category_id',
        'description',
        'video_link',
        'main_img',
        'extra_imgs',
        'functionalities',
    ];
}
