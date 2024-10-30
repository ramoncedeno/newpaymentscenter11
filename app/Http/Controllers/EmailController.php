<?php

namespace App\Http\Controllers;

use App\Mail\ImportNotification;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $title = 'Welcome to the laracoding.com example email';
        $body = '¡Ya puedes revisar los registros!';

        try {
            Mail::to('rcedeno@igroupsolution.com')->send(new ImportNotification($title, $body));
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return 'Email sent successfully!';
    }
}
