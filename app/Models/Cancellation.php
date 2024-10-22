<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cancellation extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    use HasFactory;


        // Defines attributes that can be mass assigned.
    protected $fillable = [

        'cancellation_sale_id',
        'cancellation_employee_cancellation',
        'cancellation_cancellation_status_id',
        'cancellation_cancellation_status_date',
        'cancellation_cancellation_reason',
        'cancellation_origin_date',
        'cancellation_origin',

    ];

        //Hide attributes when the model is converted to an array or JSON.
    protected $hidden = [


    ];


    //Converts attributes to a specific data type.

    protected $casts = [


        'cancellation_cancellation_status_date'=>'timestamps',
        'cancellation_origin_date' =>'timestamps',

    ];

}
