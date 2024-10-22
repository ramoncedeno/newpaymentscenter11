<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PaymentSup extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'payment_sups_sale_id',
        'payment_sups_cancellation_id',
        'payment_sups_rate_id',
        'payment_sups_temporality_id',
        'payment_sups_origin',
        'payment_sups_origin_date',
        'payment_sups_payment_method',


        // attributes related to the type of employee

        'payment_sups_payed_status_id',
        'payment_sups_temporality_status_id',
        'payment_sups_effective_date',
        'payment_sups_unit_price',
        'payment_sups_currency',
        'payment_sups_goal',
        'total_to_pay'



     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [

        'payment_sups_origin',


     ];

     //Converts attributes to a specific data type.
     protected $casts = [

        'payment_sups_origin_date'=>'timestamps',
        'payment_sups_effective_date'=>'timestamps'


     ];

}
