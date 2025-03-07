<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTranslate extends Model
{
    use HasFactory;
    protected $table = 'sliders_translate';
    protected $fillable = ['text_one','text_two','lang'];
}
