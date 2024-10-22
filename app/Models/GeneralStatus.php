<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class GeneralStatus extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'general_status_name',
        'general_status_is_for_employees_table',
        'general_status_is_for_customers_table',
        'general_status_is_for_sales_table',
        'general_status_is_for_cancellations_table',
        'general_status_is_for_payments_employees_table',
        'general_status_is_for_payments_supervisors_table',
        'general_status_is_for_rate',
        'general_status_description',


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [



     ];

     //Converts attributes to a specific data type.
     protected $casts = [


     ];

}
