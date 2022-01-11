<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Models\User\User;

class ResetPasswordController extends Controller
{

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetPasswordLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make( $password )
                ])->setRememberToken( Str::random(60) );

                $user->save();

                event( new PasswordReset($user) );
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function showChoosePasswordForm($email)
    {
        return view('auth.choose-password', ['email' => $email]);
    }

    public function savePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ( $user->email_verified_at ) {
            return back()->withErrors(['email' => 'This account had already choosed its password!']);
        }

        $user->update([
            'password' => Hash::make( $request->password ),
            'email_verified_at' => Carbon::now(),
        ]);

        return redirect()->route('login')->with('status', 'Your password has been saved!');
    }

}
