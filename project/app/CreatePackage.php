<?php

namespace App;



class CreatePackage extends Model
{

    public $fillable=['item_name','upload','comments'];
    
    public function info()
    {
        return $this->hasMany('App\CreatedPackageInfo', 'created_package_id', 'id');
    }
}
