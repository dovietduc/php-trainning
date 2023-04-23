<?php

require(__DIR__ . '/Model.php');

class Category extends Model {

    protected $table = 'categories';

    protected $primaryKey = 'id';

   
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id');
    }
    
    
}