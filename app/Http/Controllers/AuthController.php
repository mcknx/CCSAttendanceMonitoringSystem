<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserDashboardController;
use App\Subject;
use App\Exports\ProfessorsExport;
use Excel;
use App\Providers\RouteServiceProvider;
use App\Imports\ProfessorsImport;
use App\Imports\SubjectsImport;
use App\User;
use Auth;
use Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // use UserDashboardController;
    public function professorExport() 
    {
        return Excel::download(new ProfessorsExport, 'professorsExample.xlsx');
    }
    public function professorImport(Request $res) 
    {
        if ($res->file == null) {
          return redirect()->back();
        }
        $path = $res->file->getRealPath();
        $name = $res->file->getClientOriginalName();
        // $subjects = Subject::all();
        $subjects = Subject::where('Subj_title', '=', '404')->where('Subj_yr_sec', '=', 'IT 2B')->where('Prof_code', '=', 'masma')->first();
        // dd($subjects->Subj_dayS);
        // $findSubj= $subjects->where('Subj_title', '=', '404')->where('Subj_yr_sec', '=', 'IT 2B')->where('Prof_code', '=', 'masma');
        // dd($subjects->where('Subj_dayM', '=', '1')->first()->Subj_dayM);
        // $subjects = Excel::toArray(new SubjectsImport, $res->file('file'));
        
        Excel::import(new SubjectsImport, $path);
        
   
        
        return redirect('/subject')->with('success', 'All good!');
    }

    public function index()
    {
        return view('login');
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'username' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
          $user = Auth::user();
          // dd($user);
          if($user->role == 1) {
            return redirect()->intended('dashboard');
          }

          if($user->role == 2) {
            return redirect()->intended('userdashboard');
            // $this->index();
            
          }
            // Authentication passed...
          
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'username' => 'required|string|unique:users',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();

        $check = $this->create($data);

        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials)) {
          // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return redirect("login");
    }
     
    public function dashboard()
    { 
      if(Auth::check()){
        $user = Auth::user();
        $professor = $user->professor;
        $subjects = $user->subjects;

        return view('dashboard', ['professor' => $professor]);
      }
      return redirect("login")->withSuccess('Opps! You do not have access');
      //  return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'username' => $data['username'],
        // 'password' => $data['password']
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function changeCredential(Request $request, $id) {
      $user = User::find($id);
      $first = $request->input('fname') ;
      $last = $request->input('lname') ;
      $middle = $request->input('mname') ;
      $pass = $request->input('password') ;
      $cpass = $request->input('password_confirmation') ;

      $username = $first[0] . $last;
      $user->username = $username;
      $user->name = $first . $last . $middle;

      $res = null;
      if ($pass == $cpass) {
        $res = $pass;
        $user->password = Hash::make($res);
        $user->save();
        return back();
      }
      return back();
  }
}
