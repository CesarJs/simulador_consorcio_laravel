<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Email;
use Mail;
use View;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

     public static function enviarEmail($data,$destinatario,$destinatarioName,$template,$assunto,$msg=null)
    {       $data['host']=$_SERVER['SERVER_NAME'];
            $mensagem = null;           
            $fromEmail = env('MAIL_FROM');
            $fromName = env('MAIL_CONTACT');

            try {
                Mail::send('templatesEmail.'.$template, $data, function($mensagem) use($fromEmail,$fromName,$destinatario,$destinatarioName,$assunto,$msg){
                    $mensagem->to($destinatario,$destinatarioName);
                    $mensagem->from($fromEmail,$fromName);
                    $mensagem->subJect($assunto);
                });
                return true;
                
            } catch (Exception $e) {
                Email::create([
                    'data'=> json_encode($data),
                    'destinatario'=>$destinatario,
                    'destinatarioName'=>$destinatarioName,
                    'template'=>$template,
                    'assunto'=>$assunto,
                    'msg'=>$msg
                    ]);
                return true;
                
            }
           
       
       
    }

}
