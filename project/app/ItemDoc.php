<?php

namespace App;



class ItemDoc extends Model
{
    public function packages(){
    	return $this->belongsTo(Package::class);
    }
}
