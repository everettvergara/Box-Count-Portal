<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'code';
    }


    public function api_login(Request $r)
    {
        // Manual validation for API
        $validator = Validator::make($r->all(), [
            'user_code'  => 'required|string',
            'password'   => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => $validator->errors()->first(), // return first error message
                ]
            ], 422);
        }

        // Attempt authentication
        $credentials = [
            'code'     => $r->user_code, // adjust if you use email/username
            'password' => $r->password,
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 'INVALID_CREDENTIALS',
                    'message' => 'Invalid login credentials.',
                ]
            ], 401);
        }

        $user = Auth::user();
        // Generate token
        $newToken = $user->createToken('authToken',);
        $newToken->accessToken->expires_at = Carbon::now()->endOfDay();
        $newToken->accessToken->save();

        $token = preg_replace('/^\d+\|/', '', $newToken->plainTextToken);

        return response()->json([
            'success' => true,
            'data' => [
                'access_token' => $token,
            ]
        ], 200);
    }

    protected function redirectTo()
    {
        $redirect = request()->input('redirectTo', '/');

        // Only allow relative paths, not full URLs
        if (! str_starts_with($redirect, '/')) {
            $redirect = '/';
        }

        return $redirect;
    }

    protected function authenticated(Request $r, $user)
    {
        store_audit($user->id, 'LOGIN');
    }
}
