<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public static function state_name($state_id)
    {
    	if($state_id){

	        $state_name= State::where('id',$state_id)->pluck('name');
	        
	        foreach($state_name as $state)
	        {

	            $state_name = $state;
	        }    
	   
	        return $state_name;
    	}else{
    		return '';
    	}
    }
}
