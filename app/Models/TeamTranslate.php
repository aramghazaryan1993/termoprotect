<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTranslate extends Model
{
    use HasFactory;
    protected $table = 'teams_translate';
    protected $fillable = ['name', 'position', 'text','team_id','lang'];
}
