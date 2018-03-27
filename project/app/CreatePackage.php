<?php

namespace App;



class CreatePackage extends Model
{
    public function info()
    {
        return $this->hasMany('App\CreatedPackageInfo', 'created_package_id', 'id');
    }
}
