<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->first_name) {
            auth()->user()->update(['first_name' => $request->first_name]);
        }

        if ($request->surname) {
            auth()->user()->update(['surname' => $request->surname]);
        }

        if ($request->company_name) {
            auth()->user()->update(['company_name' => $request->company_name]);
        }

        if ($request->pesel) {
            auth()->user()->update(['pesel' => $request->pesel]);
        }

        if ($request->nip) {
            auth()->user()->update(['nip' => $request->nip]);
        }

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
