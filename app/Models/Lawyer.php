<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Lawyer extends LocalizedModel implements HasMedia
{
    use HasFactory;     use InteractsWithMedia;


    protected $table = 'lawyers';


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('web')
            ->quality(30)
            ->watermark(storage_path('app/public/watermark-logo.png'))
            ->watermarkPosition(Manipulations::POSITION_TOP_LEFT) // Position
            ->watermarkPadding(1, 1, Manipulations::UNIT_PIXELS) // Small padding of 5px
            ->watermarkWidth(20, Manipulations::UNIT_PERCENT) // Reduce the watermark width to 30%
            ->watermarkHeight(20, Manipulations::UNIT_PERCENT) // Reduce the watermark height to 30%
            ->optimize();

        $this->addMediaConversion('mobile')
            ->quality(10) // Mobile-ի համար կարող է նույնիսկ ավելի փոքր լինել

            ->watermark(storage_path('app/public/watermark-logo.png'))
            ->watermarkPosition(Manipulations::POSITION_TOP_LEFT) // Position
            ->watermarkPadding(1, 1, Manipulations::UNIT_PIXELS) // Small padding of 5px
            ->watermarkWidth(20, Manipulations::UNIT_PERCENT) // Reduce the watermark width to 30%
            ->watermarkHeight(20, Manipulations::UNIT_PERCENT) // Reduce the watermark height to 30%
            ->optimize();
    }
}
