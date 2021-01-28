<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use Resizable;
    use Translatable;
    use NodeTrait;

    protected $translatable = ['title', 'seo_title', 'meta_description', 'description'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'categories_products');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

}
