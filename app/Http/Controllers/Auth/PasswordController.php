<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.change-password', [
            'user' => $request->user(),
        ]);
    }


    public function update(ChangePasswordRequest $request)
    {
        try {
            $user = $request->user();


            if (Hash::check($request->current_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);

                Auth::logout($user);

                return back()->with('success', "Password successfully changed!");
            } else {
                return back()->withErrors(['current_password' => 'The provided password does not match our records.'], 'updatePassword');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
}
