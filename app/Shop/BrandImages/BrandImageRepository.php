<?php

namespace App\Shop\BrandImages;

use App\Shop\Base\BaseRepository;
use App\Shop\Products\Product;

class BrandImageRepository extends BaseRepository
{
    /**
     * ProductImageRepository constructor.
     * @param ProductImage $productImage
     */
    public function __construct(BrandImage $brandImage)
    {
        parent::__construct($brandImage);
        $this->model = $brandImage;
    }

    /**
     * @return mixed
     */
    public function findBrand() : Brand
    {
        return $this->model->brand;
    }
}
