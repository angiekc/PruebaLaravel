<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Socialite;

class SocialAuthController extends Controller
{
	//Redirección a Facebook
	public function redirectToProvider($provider)
	{
		return Socialite::driver($provider)->redirect();
	}

	//obtener información del usuario
	public function handleProviderCallback($provider)
	{
		// Obtenemos los datos del usuario
        $socialUser = Socialite::driver($provider)->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $socialUser->email)->first()) { 	        
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->avatar,
            ]);
 
            return $this->authAndRedirect($user); // Login y redirección
        }
	}

	// Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);    	
        return redirect()->to('/home');
    }
}
