<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendOtpNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function verifyOtp(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|max:6',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email.']);
        }

        // Check if the user is locked out
        if ($user->otp_locked_until && Carbon::parse($user->otp_locked_until)->isFuture()) {
            $lockoutTimeRemaining = Carbon::parse($user->otp_locked_until)->diffForHumans();
            return back()->withErrors(['otp' => "Account is locked due to too many failed attempts. Please try again in $lockoutTimeRemaining."]);
        }

        // Check if the OTP is correct and not expired
        if ($user->otp === $request->otp && Carbon::parse($user->otp_expires_at)->isFuture()) {
            // OTP is correct and not expired, reset attempts
            $user->email_verified_at = Carbon::now();
            $user->otp = null; // Clear OTP
            $user->otp_expires_at = null;
            $user->otp_attempts = 0; // Reset attempts
            $user->otp_locked_until = null; // Clear lockout time
            $user->save();

            return redirect()->route('home')->with('status', 'OTP verified successfully!');
        } else {
            // Increment OTP attempts
            $user->otp_attempts += 1;

            if ($user->otp_attempts >= 3) {
                // Lock the account for 15 minutes after 3 failed attempts
                $user->otp_locked_until = Carbon::now()->addMinutes(15);
                $user->save();
                return back()->withErrors(['otp' => 'Too many failed attempts. Account is locked for 15 minutes.']);
            }

            // Save the updated attempts
            $user->save();

            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }
    }

    public function resendOtp(Request $request)
    {
        // Retrieve the user by the provided email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Generate a new OTP
        $otp = rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(5); // OTP expires in 5 minutes

        // Update the user with the new OTP and expiry time
        $user->otp = $otp;
        $user->otp_expires_at = $otpExpiry;
        $user->save();

        // Send the new OTP via notification
        $user->notify(new SendOtpNotification($otp));

        return redirect()->route('otp.form')->with('message', 'OTP has been resent.');

    }

}
