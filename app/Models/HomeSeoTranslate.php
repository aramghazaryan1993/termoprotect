<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSeoTranslate extends Model
{
    use HasFactory;
    protected $table = 'home_seo_translate';
    protected $fillable = ['seo_title', 'seo_description', 'seo_keyword', 'lang'];
}
