<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use HasFactory;

    use Resizable;
    use Translatable;

    protected $translatable = ['name', 'seo_title', 'meta_description', 'description', 'cosmetics_class', 'appointment', 'application', 'structure', 'skin_type', 'type_products', 'country'];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'categories_products')->withDefault();
    }

    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer')->withDefault();
    }

    public function products()
    {
        return $this->belongsToMany(Related::class, 'product_relations');
    }

}
