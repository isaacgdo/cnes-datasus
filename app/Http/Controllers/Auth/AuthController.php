<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /** Desloga o usuário e cancela o token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Deslogado com sucesso'
        ]);
    }

    /** Recupera dados do usuário autenticado
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /** Redireciona o usuário para a página de autenticação do Provedor Oauth
     *
     * @return mixed
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /** Obtém as informações do usuário pelo Provedor Oauth
     *
     *
     */
    public function handleProviderCallback(Request $request, $driver)
    {
        try {
            $user = Socialite::driver($driver)->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();
        if (!is_null($existingUser)) {
            $token = $existingUser->createToken('Oauth Access Token')->accessToken;
            auth()->login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->provider_name = $driver;
            $newUser->provider_id = $user->getId();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar = $user->getAvatar();
            $newUser->save();

            $token = $newUser->createToken('Oauth Access Token')->accessToken;
            auth()->login($newUser, true);
        }

        return 'Token de Acesso. access_token = '.$token;

//        return redirect()->route('professionals.list')
//            ->withCookie(cookie('access_token', $token, 60*24*360, null, null, null, false, false, null));;
    }
}