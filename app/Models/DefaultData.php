<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultData extends LocalizedModel
{
    use HasFactory;
    protected $table = 'default_data';
}
