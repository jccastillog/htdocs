<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailInfo;
use App\Models\Service;


class MailInfoController extends Controller
{
    public function index(){
        /* return view('service.mailInfo'); */
    }

    public function mailMe(Request $request){

        $serviceId = $request->input('service_id') ?? $request->route('service_id');
        $service = Service::find($serviceId); 

        if (!$service) {
            return redirect()->back()->with('error', 'Servicio no encontrado.');
        }

        Mail::to(Auth::user()->email)->send(new MailInfo(Auth::user()->name, $service));
        return redirect()->back()->with('success', 'Correo enviado correctamente.');
    }
}
