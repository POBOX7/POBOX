<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public static function country_name($id)
    {
        
        $country_name= Country::where('id',$id)->pluck('country_name');
        
        foreach($country_name as $country)
        {
            $name = $country;
        }    
       
        return $name;
        
    }
    public static function country_id($name)
    {
    	$country_name= Country::where('name',$name)->pluck('id');
        
        foreach($country_name as $country)
        {
            $name = $country;
        }    
        return $name;
    }
}
