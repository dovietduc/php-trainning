<?php

class Product extends Model {

    protected $table = 'products';

   
    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    
    
}