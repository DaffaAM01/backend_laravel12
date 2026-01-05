<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function loginWeb(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Login gagal!']);
    }
    public function loginAPI(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function logout(Request $request)
    {
        if ($request->expectsJson()) {
            try {
                $user = $request->user();

                if ($user && $user->currentAccessToken()) {
                    /** @var \Laravel\Sanctum\PersonalAccessToken $token */
                    $token = $user->currentAccessToken();
                    $token->delete();
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Logout API berhasil'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal logout API',
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        // Jika request dari Web (Browser)
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil logout');
    }

    public function index(){
        $users = User::select('id','name','email','created_at','updated_at')->get();
        return response()->json([
            'success' => true,
            'message' => 'List semua user',
            'data' => $users
        ]);
    }
}
