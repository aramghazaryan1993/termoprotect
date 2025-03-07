<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSeoTranslate extends Model
{
    use HasFactory;
    protected $table = 'contact_seo_translate';
    protected $fillable = ['seo_title', 'seo_description', 'seo_keyword','slug', 'lang'];
}
