<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
                /*if($this->isHttpException($exception)){

            switch ($exception->getStatusCode()) {

                case 404:

                    return redirect()->route('404');

                    break;

                case 405:

                    return redirect()->route('404');

                    break;

                default:

                    return redirect()->route('404');
                    break;     

            }

        }
       */
       // return redirect()->route('404');
        //return parent::render($request, $exception);
          if (isset($request)) {
           return parent::render($request, $exception);
        }
        if (!isset($request)) {
        return redirect()->route('404');
    }
    }
}