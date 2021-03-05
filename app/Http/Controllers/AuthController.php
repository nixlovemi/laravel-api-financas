<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\TbUsuario;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login']);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $retUser = auth()->user();

        $response = lpApiResponse(
            false,
            'Dados do usuário logado!',
            [
                "user" => $retUser->getAttributes()
            ]
        );

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Login the user and return the JWT token
     *
     * @param Request $request [email, password]
     * @return json []
     */
    public function login(Request $request)
    {
        // dd(TbUsuario::where('usu_ativo', 1)->get());
        $loginError = true;
        $User       = TbUsuario::where('usu_login', $request->login)
                        ->where('usu_senha', md5($request->password))
                        ->where('usu_ativo', 1)
                        ->first();
        if($User !== null){
            $token      = Auth::login($User);
            $loginError = $token === false;
        }

        if ($loginError) {
            $response = lpApiResponse(true, 'Credenciais inválidas');
            return response()->json($response, Response::HTTP_UNAUTHORIZED);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        $response = lpApiResponse(false, 'Logout efetuado com sucesso!');
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Return the array with token information
     *
     * @param [type] $token
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithToken($token)
    {
        $response = lpApiResponse(
            false,
            'Usuário logado com sucesso!',
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        );

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Returns the message when user is unauthenticated
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unauthenticated()
    {
        $response = lpApiResponse(
            true,
            'Por favor, faça o login antes de usar essa rota'
        );

        return response()->json($response, Response::HTTP_UNAUTHORIZED);
    }
}