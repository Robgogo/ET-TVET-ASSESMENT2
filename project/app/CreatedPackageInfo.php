<?php

namespace App;



class CreatedPackageInfo extends Model
{
    public function package()
    {
        return $this->belongsTo('App\CreatePackage', 'created_package_id', 'id');
    }
}
