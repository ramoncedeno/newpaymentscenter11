<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Sale extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [


            'sale_customer_id',
            'sale_employee_sale_id',
            'sale_employee_activation_id',
            'sale_trade_id',
            'sale_product_id',
            'sale_status_sale_id',
            'sale_status_date',
            'sale_origin',
            'sale_origin_date',


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [

        'sale_origin'



     ];

     //Converts attributes to a specific data type.
     protected $casts = [

        'sale_status_date'=>'timestamps',
        'sale_origin_date'=>'timestamps',



     ];

}
