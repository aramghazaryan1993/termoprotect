<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerTranslate extends Model
{
    use HasFactory;
    protected $table = 'lawyer_translate';

    protected $fillable = ['lawyer_id', 'title', 'text', 'seo_title', 'seo_description', 'seo_keyword', 'slug', 'lang'];

}
