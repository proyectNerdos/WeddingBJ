<?php

namespace Modules\WebContent\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Log;

use Illuminate\Contracts\Support\Renderable;
use Modules\WebContent\Notifications\ContactFormNotification;

use App\Models\User;

use Alert;

class PublicController extends Controller
{

    public function index()
    {
        return view('webcontent::website.casamiento.home');
    }


    // public function contact() {
    //     $pageTitle = 'Contacto';
    //     $branches = Branch::select('id', 'name', 'address', 'map_url')->where('active', 1)->get();

    //     return view('webcontent::dralex.contact', compact('pageTitle', 'branches'));
    // }

    // public function infoRequestSubmit(Request $request) {
    //     Log::info('TEMP BACKUP. Valores recibidos de la forma: ' . json_encode($request->all()));

    //     $data = [
    //         'question-1'    => $request->input('question-1'),
    //         'question-2'    => $request->input('question-2'),
    //         'question-3'    => $request->input('question-3'),
    //         'question-4'    => $request->input('question-4'),
    //         'name'    => $request->name,
    //         'email'   => $request->email,
    //         'phone'   => $request->phone,
    //         'message' => $request->message,
    //     ];

    //     //IGP.02.2023 envio de forma de contacto
    //     //HBS 2022.11 Enviar notificacion a administrador
    //     $admin = User::find(config('global.user_notifiable'));
    //     if($admin) {
    //         $admin->notify(new InfoFormNotification($data));
    //     }

    //     return redirect()->back()->with('success', 'Tu formulario ha sido enviado con éxito. Muy pronto nos pondremos en contacto contigo para agendar tu cita.');
    // }

    public function contactSubmit(Request $request) {

        Log::info('TEMP BACKUP. Valores recibidos de la forma: ' . json_encode($request->all()));

        $data = [
            'name'    => $request->name,
            'phone'   => $request->phone,
            //'subject' => $request->subject,
            'email'   => $request->email,
            'message' => $request->message,

        ];

        try {
            $admin = User::find(config('global.user_notifiable'));
            if($admin) {
                $admin->notify(new ContactFormNotification($data));
            }
            //log
            Log::info('ContactFormNotification sent to admin: ' . json_encode($data));
            Alert::success('Success', 'Tu mensaje ha sido enviado. Muy pronto nos pondremos en contacto contigo');
            return redirect()->route('home');
        } catch (\Exception $e) {
            Log::error('Exception caught: ', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            Alert::error('Error', 'Ha ocurrido algún error. Reintenta o ponte en contacto por otra vía.');
            return redirect()->route('home');
        }
    }


}
