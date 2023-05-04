<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('home.login');
    }
    public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

     /*   $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            $user = auth()->user();
          //  dd($user);
            return redirect()->intended('dashboard');
        } else {



            return back()->with('error', 'your username and password are wrong.');
        }

      /*  if (!Auth::validate($credentials)) :
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return $this->authenticated($request, $user);


        /*  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'remember_me' => 'boolean'
        ]);
              /*  if ($request->has('remember_me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        $user = new User();
        $user->name = $request->name;
        $credentials = $request->only('email', 'password');
        Auth::login($user, $request->get('remember'));

         if (Auth::attempt($credentials)) {
             return redirect()->intended('dashboard')
                 ->withSuccess('Signed in');
        }

         return redirect("login")->withSuccess('Login details are not valid');*/
    }
    public function registration()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('home.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        $data = $request->all();
        $check = $this->create($data);
        return redirect()->route('home');
        // return response()->json($check);
        //    return  $checkك redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'gender' => $data['gender'],
            'first_name' => $data['first_name'],
            'mobile_number' => $data['mobile_number'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'password' => Hash::make($data['password'])
        ]);
    }



    public function signOut()
    {
        //  Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    //
}
