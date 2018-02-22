<?php

namespace App;


class Package extends Model
{
    public function items(){
    	return $this->hasMany(ItemDoc::class);
    }
}
