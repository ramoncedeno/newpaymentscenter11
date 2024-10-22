<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Rate extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'rate_product_id',
        'rate_role_id',
        'rate_trade_category_id',
        'rate_temporality_status_id',
        'rate_unit_price',
        'rate_currency',
        'rate_goal',
        'rate_effective_date'


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [



     ];

     //Converts attributes to a specific data type.
     protected $casts = [

        'rate_effective_date'=>'timestamps',

     ];

}
