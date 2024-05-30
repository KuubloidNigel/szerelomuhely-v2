<?php

namespace App\Http\Controllers\Auth;

use App\Models\Szerelo;
use App\Models\Munkafelvevo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'lista',
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'azonosito' => 'required|string|max:250|unique:users',
            'password' => 'required|min:3|confirmed',
            'role' => 'required|in:szerelo,munkafelvevo' // Validate role input
        ]);

        User::create([
            'name' => $request->name,
            'azonosito' => $request->azonosito,
            'password' => Hash::make($request->password),
            'role' => $request->role // Save the role
        ]);

        if($request->role == "szerelo"){
            Szerelo::create(['nev'=> $request->name, 'azonosito' => $request->azonosito]);
        } else if($request->role == "munkafelvevo"){
            Munkafelvevo::create(['nev'=> $request->name, 'azonosito' => $request->azonosito]);
        }

        $credentials = $request->only('azonosito', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'azonosito' => 'required|string',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'azonosito' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('azonosito');

    } 
    
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'azonosito' => 'Please login to access the dashboard.',
        ])->onlyInput('azonosito');
    } 
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    

}