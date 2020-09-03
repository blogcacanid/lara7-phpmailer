<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    
    public function index()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $to         = $request->get('to');
        $subject    = $request->get('subject');
        $message    = $request->get('message');
 
        $mail = new PHPMailer(true);
 
        try {
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host       = 'smtp.googlemail.com';   
            $mail->SMTPAuth   = true;
            $mail->Username   = 'email_gmail_anda@gmail.com'; // silahkan ganti dengan alamat email Anda
            $mail->Password   = 'password_email_gmail_anda'; // silahkan ganti dengan password email Anda
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('email_gmail_anda@gmail.com@gmail.com', 'CACAN'); // silahkan ganti dengan alamat email Anda
            $mail->addAddress($to);
            $mail->addReplyTo('blog.cacan.id@gmail.com', 'BLOG CACAN'); // silahkan ganti dengan alamat email Anda
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            $request->session()->flash('status', 'Message has been sent!');
            return view('contact');
        } catch (Exception $e) {
            $request->session()->flash('status', "Send Email failed. Error: ".$mail->ErrorInfo);
            return view('contact');
        }
    }

}