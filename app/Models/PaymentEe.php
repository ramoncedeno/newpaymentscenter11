<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PaymentEe extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'payment_ees_sale_id',
        'payment_ees_cancellation_id',
        'payment_ees_rate_id',
        'payment_ees_temporality_id',
        'payment_ees_origin',
        'payment_ees_origin_date',
        'payment_ees_payment_method',


        // attributes related to the type of employee
        'payment_ees_status_payed_to_employee',
        'payment_ees_temporality_status_id_employee',
        'payment_ees_effective_date_employee',
        'payment_ees_unit_price_employee',
        'payment_ees_currency_employee',
        'payment_ees_goal_employee',
        'total_to_pay'


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [



     ];

     //Converts attributes to a specific data type.
     protected $casts = [

        'payment_ees_origin_date'=>'timestamps',


     ];


}
