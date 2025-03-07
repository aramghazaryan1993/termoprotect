<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslate extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'title', 'text', 'seo_title', 'seo_description', 'seo_keyword', 'slug', 'lang'];
}
