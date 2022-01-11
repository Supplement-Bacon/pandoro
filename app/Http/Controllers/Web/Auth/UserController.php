<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Helpers\Nuage;

use App\Models\User\User;

class UserController extends Controller
{

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'string',
            'picture' => 'image',
        ]);

        $user->fill( $request->only(['first_name', 'last_name', 'email', 'phone']) );

        if ( $request->has('picture') ) {
            
            // Delete the current picture
            if ( $user->picture_path ) {
                Nuage::deleteFile( $user->picture_path );
            }
            $user->picture_path = Nuage::storeFile('users/profile', $request->picture);
        }

        $user->save();

        return redirect()->route('profile')->with('Profile successfully updated!');
    }
    
}
