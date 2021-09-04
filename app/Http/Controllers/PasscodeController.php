<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasscodeController extends Controller
{
    public function enterPasscode(Request $request)
    {
        $this->validate($request, [
            'passcode' => 'required'
        ]);

        if ($request->passcode == env('SICAPIN_PASSCODE')) {
            session(['X-SICAPIN-PASSCODE' => env('SICAPIN_PASSCODE')]);
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function deletePasscode(Request $request)
    {
        $request->session()->forget('X-SICAPIN-PASSCODE');
        return redirect()->route('passcode');
    }
}
