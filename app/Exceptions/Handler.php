<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Auth;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {   
       /* return redirect()->route('404');*/
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       return parent::render($request, $exception);
          $url = (explode('.', $_SERVER['HTTP_HOST']));
        
          if(isset($url[0]) && $url[0]=='admin'){
              //return view('errors.404_admin'); 
              return redirect()->route('404_page');
          }else{
              return redirect()->route('404');
          }
        //dd(auth()->user()->role_id);
       // return parent::render($request, $exception);
        //return redirect()->route('404');
         if (auth()->user()->role_id == 1) {
             return view('errors.404_admin'); 
        }
       
        if (auth()->user()->role_id !== null) {
            return view('errors.404');   
        }

       /* if (isset($request)) {
           return parent::render($request, $exception);
        }
        if (!isset($request)) {
        return redirect()->route('404');
       }*/
      // return parent::render($request, $exception);
       
    }
}
