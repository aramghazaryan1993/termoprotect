<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSeo extends LocalizedModel
{
    use HasFactory;
    protected $table = 'home_seo';
}
