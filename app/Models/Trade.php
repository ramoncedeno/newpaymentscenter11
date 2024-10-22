<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Trade extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'trade_name',
        'trade_address',
        'trade_contact_phone_number',
        'trade_category_id',



     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [



     ];

     //Converts attributes to a specific data type.
     protected $casts = [

        'trade_address'=>'hashed',
        'trade_contact_phone_number'=>'hashed',


     ];

}
