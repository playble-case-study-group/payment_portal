<?php

namespace App\Shop\BrandImages;

use App\Shop\Products\Brand;
use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    protected $fillable = [
        'brand_id',
        'src'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
