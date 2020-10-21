<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\ContactUsDetail;
use View;
class Controller extends BaseController
{
    
    public function __construct(){
       global $ContactUsDetails;
       $ContactUsDetails = ContactUsDetail::first();
       //dd($ContactUsDetails);
       View::share ('ContactUsDetails', $ContactUsDetails);
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
}
