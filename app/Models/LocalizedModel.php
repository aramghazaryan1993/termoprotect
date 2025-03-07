<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class LocalizedModel extends Model
{
    use HasFactory;

    public const lang = [
        ['name' => 'Arm' ,'value' => 'hy'] ,
        ['name' => 'Eng' ,'value' => 'en'],
        ['name' => 'Rus' ,'value' => 'ru'] ,
        ['name' => 'Spa', 'value' => 'es']
    ];

    public const id = 'id';



    public function localization()
    {
        return $this->hasOne(
            $this->getLocalizationModelName()
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localizations()
    {
        return $this->hasMany(
            $this->getLocalizationModelName()
        );
    }

    /**
     * @param Builder $query
     * @param string $locale
     */
    public function scopeWithLocalization(Builder $query, string $locale)
    {
        $filter = function($query) use ($locale) {
            /* @var Builder $query */
            $query->where('lang', $locale);
        };
        $query
            ->whereHas('localization', $filter)
            ->with([
                'localization' => $filter
            ]);
    }

    /**
     * @return string
     */
    private function getLocalizationModelName()
    {
        return get_class($this).'Translate';
    }
}


