<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PasswordResetController extends Controller
{
    public function showRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        
        $token = Str::random(64);

        
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        
        $resetLink = url('/password/reset/' . $token);

        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';       
            $mail->SMTPAuth = true;
            $mail->Username = 'manithavasi01@gmail.com'; 
            $mail->Password = 'jgoi rurh bzjq sqbr';   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; 

            $mail->setFrom('your-email@example.com', 'aaaa');
            $mail->addAddress($request->email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the link below to reset your password:<br><a href='$resetLink'>Here</a>";

            $mail->send();
            return back()->with('success', 'We have emailed your password reset link!');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $mail->ErrorInfo);
        }
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        
        $passwordReset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        
        DB::table('users')
            ->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/')->with('success', 'Your password has been reset!');
    }
}
