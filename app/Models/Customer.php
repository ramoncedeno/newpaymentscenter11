<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Customer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    // Defines attributes that can be mass assigned.
    protected $fillable = [

        'customer_card',
        'customer_customer_name',
        'customer_member_since',
        'customer_status_account_id',
        'customer_status_contract_id',

    ];



    //Hide attributes when the model is converted to an array or JSON.
    protected $hidden = [

        'customer_card',

    ];

    //Converts attributes to a specific data type.
    protected $casts = [

        'customer_card'=>'encrypted',


    ];


}
