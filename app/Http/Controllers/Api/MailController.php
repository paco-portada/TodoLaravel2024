<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Mail\NewEmail;
use Validator;
use Exception;

class MailController extends BaseController
{     
    public function sendEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'to' => 'required|email',
            'from' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        if ($validator->fails()) {
            // $status = 501;
            // return response()->json( ['status' => false, 'message' => $validator->errors()->getMessages()], 501);
            return $this->sendError('Error validation', $validator->errors()->getMessages(), 400); 
        } else {                                           
                try {
                    $email =  $request->json()->all();
                    $to = $email['to'];
                    $from = $email['from'];
                    $subject = $email['subject'];
                    $message = $email['message'];

                    $data = [
                        'subject' => $subject,
                        'to' => $to,
                        'from' => $from,
                        'message' => $message
                        ];
                    
                    Mail::send('emails.send', $data, function($message) {
                            $message->to('paco.portada@protonmail.com')->subject('hola');
                            $message->from('emisor@gmail.com');
                            });
                            
                    //Mail::to('paco.portada@protonmail.com')->send(new NewEmail($from, $subject, $message));
                    // $status = 200;
                    return $this->sendResponse('', 'Email has been sent to ' . $data['to']);
                } catch (Exception $exception) {
                    // $status = 554;
                    return $this->sendError('', 'Email has not been sent. Error: ' . $exception->getMessage(), 500);
                }
            }

      //return response()->json($message, $status);
    }
}