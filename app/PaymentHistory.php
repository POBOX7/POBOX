<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table="paymenthistory";


    protected $fillable=[
      'user_id',
      'payment_id',
      'order_id',
      'status'
    ];
}
