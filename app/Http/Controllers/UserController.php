<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateAccount;
use App\Http\Requests\UserLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function store(UserCreateAccount $request)
    {
        if ($request->validated()) {

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $user->save();
            return redirect()->route('regSuccess');
        } else {
            return back()->withErrors($request->validated())->writeInput();
        }
    }

    public function destroy(){

        $user=User::findOrFail(auth()->user()->id);

        if($user->avatar){
            Storage::disk('public')->delete($user->avatar->path);
        }

        if($user->delete()){

            return redirect()->route('index')->with('success', "Uspesno obrisan nalog");
        }
        else {
            return redirect()->back()->with('error', "Doslo je do greske");
        }

    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(UserLogin $request)
    {

        if (auth()->attempt($request->validated())) {
            request()->session()->regenerate();
            return redirect()->route('index');
        }

        return redirect()->route('login')->withErrors([
            'credentialsError' => "Pogresno korisnicko ime ili lozinka",
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('index');
    }

}
