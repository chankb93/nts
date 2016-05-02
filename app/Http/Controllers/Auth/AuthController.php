<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */

  use AuthenticatesAndRegistersUsers;

  /**
   * Where to redirect users after login / registration.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new authentication controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'loginId' => 'required|max:16',
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          //'password' => 'required|min:6|confirmed',
      ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function create(array $data)
  {
      return User::create([
          'loginId' => $data['loginId'],
          'name' => $data['name'],
          'email' => $data['email'],
          //'password' => bcrypt($data['password']),
      ]);
  }

  /**
   * Handle an authentication attempt.
   *
   * @return Response
   */
  // public function authenticate(array $data)
  // {
  //     if (Auth::attempt([
  //       'loginId' => $data['loginId']
  //       ])) {
  //         // Authentication passed...
  //         return redirect()->intended('dashboard');
  //     }
  // }
  public function postRegister(Request $request)
  {
    //pass through validation rules
    $this->validate($request, [
      'loginId' => 'required|regex:/^(?i)[PSI]\d{7}$/'
    ]);

    $credentials = [
        'loginId' => strtoupper(trim($request->get('loginId')))
    ];

    User::create([
     'loginId' => $request['loginId'],
     'name' => $request['name'],
     'email' => $request['email'],
     ]);

    //show error if invalid data entered
    return redirect()->back()->with('message', 'Login/Pass do not match')->withInput();
  }

  public function postLogin(Request $request)
  {
    //pass through validation rules
    $this->validate($request, [
      'loginId' => 'required|regex:/^(?i)[PSI]\d{7}$/'
    ]);

    $credentials = [
        'loginId' => trim($request->get('loginId'))
    ];

    $remember = $request->has('remember');

    //log in the user
    $user = User::where('loginId', $credentials['loginId'])->first();

    if ($user != null) {
      Auth::login($user);
      return redirect()->intended('/')->with('message', 'Successfully logged in');
    }

    //show error if invalid data entered
    return redirect()->back()->with('message', 'Login/Pass do not match')->withInput();
  }

  public function getLogout()
  {
    //Auth::logout();
    Auth::logout();
    //Session::flush();
    return redirect()->back()->with('message', 'Successfully logged out');
  }
}
