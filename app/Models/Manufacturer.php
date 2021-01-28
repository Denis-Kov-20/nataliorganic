<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Manufacturer extends Model
{
    use HasFactory;
    use Resizable;
    use Translatable;

    protected $translatable = ['title', 'seo_title', 'meta_description', 'description'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
