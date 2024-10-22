<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'product_name',
        'product_code_id',
        'product_pricing',


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [

        'product_pricing',



     ];

     //Converts attributes to a specific data type.
     protected $casts = [


     ];

}
