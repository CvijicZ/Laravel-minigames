<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNewAvatar;
use App\Models\Avatar;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function store(CreateNewAvatar $request)
    {
        if ($request->validated()) {

            $user = auth()->user();
            $avatar = $user->avatar;

            if ($avatar && $avatar->path) {
                Storage::disk('public')->delete($avatar->path);
            }

            else {

                $avatar = new Avatar([

                    'user_id' => $user->id,

                ]);
            }

            if ($request->hasFile('avatar')) {

                $path = $request->file('avatar')->store('avatars', 'public');
                $avatar->path = $path;
            }

            $avatar->save();

            return redirect()->route('user.profile')->with('success', 'Uspesno postavljena slika');
        } else {
            return back()->withErrors($request->validated())->withInput();
        }
    }
}
