<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends LocalizedModel  implements HasMedia
{
    use HasFactory;
    protected $table = 'sliders';
    use InteractsWithMedia;


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('web')
//                ->format(Manipulations::FORMAT_WEBP
                ->quality(30) // Նվազեցնում է ֆայլի որակը՝ պահպանելով բարձր որակ
//                 ->sharpen(10)
                ->watermark(storage_path('app/public/watermark-logo.png'))
                ->watermarkPosition(Manipulations::POSITION_TOP_LEFT) // Position
                ->watermarkPadding(1, 1, Manipulations::UNIT_PIXELS) // Small padding of 5px
                ->watermarkWidth(20, Manipulations::UNIT_PERCENT) // Reduce the watermark width to 30%
                ->watermarkHeight(20, Manipulations::UNIT_PERCENT) // Reduce the watermark height to 30%
                ->optimize();

       $this->addMediaConversion('mobile')
//                ->format(Manipulations::FORMAT_WEBP)
                ->quality(30) // Mobile-ի համար կարող է նույնիսկ ավելի փոքր լինել
                // ->sharpen(10)
                ->watermark(storage_path('app/public/watermark-logo.png'))
                 ->watermarkPosition(Manipulations::POSITION_TOP_LEFT) // Position
                ->watermarkPadding(1, 1, Manipulations::UNIT_PIXELS) // Small padding of 5px
                ->watermarkWidth(20, Manipulations::UNIT_PERCENT) // Reduce the watermark width to 30%
                ->watermarkHeight(20, Manipulations::UNIT_PERCENT) // Reduce the watermark height to 30%
                ->optimize();
    }
}
