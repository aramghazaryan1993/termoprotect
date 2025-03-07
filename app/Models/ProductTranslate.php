<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslate extends Model
{
    use HasFactory;

    protected $fillable = ['title','text','lang','seo_title','seo_description','seo_keyword','slug'];
}
