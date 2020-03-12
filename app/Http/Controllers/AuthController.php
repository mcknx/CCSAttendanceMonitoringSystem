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
use App\Professor;
use App\Semester;
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
    // $subjects = Subject::all();
    // $subjects = Subject::where('Subj_title', '=', '404')->where('Subj_yr_sec', '=', 'IT 2B')->where('Prof_code', '=', 'masma')->first();
    // dd($subjects->Subj_dayS);
    // $findSubj= $subjects->where('Subj_title', '=', '404')->where('Subj_yr_sec', '=', 'IT 2B')->where('Prof_code', '=', 'masma');
    // dd($subjects->where('Subj_dayM', '=', '1')->first()->Subj_dayM);
    // $subjects = Excel::toArray(new SubjectsImport, $res->file('file'));
    public function professorImport(Request $res) 
    {
        if ($res->file == null) {
          return redirect()->back();
        }
        $path = $res->file->getRealPath();
        $name = $res->file->getClientOriginalName();
        $sem = $res->input('sem');
        $from = $res->input('from');
        $to = $res->input('to');

        // Excel::import(new SubjectsImport, $path);
        $semester = new Semester();
        $semester->sem = $sem;
        $semester->from_year = $from;
        $semester->to_year = $to;
        $semester->file = $name;
        $semester->save();

        $subjects = Excel::toArray(new SubjectsImport, $res->file('file'));
        // dd($subjects[0][0]);
        foreach ($subjects[0] as $item) {
            $strDateTimein = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['subj_timein']);
            $strDateTimeout = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['subj_timeout']);
            $str = $item['days'];
            $profcode = strtolower($item['prof_fname'][0] . $item['prof_lname']);
            $professor = Professor::where('Prof_code', '=', $profcode)->first();
            
            if ($professor === null){
                $arr = [$item['prof_fname'], $item['prof_mname'], $item['prof_lname'], $profcode, $item['prof_gender']];
                $professor = new ProfessorsImport();
                $professor = $professor->model($arr);

            }
            $subject = new Subject() ;
            $subject->prof_id = $professor->id;
            $subject->sem_id = $semester->id;
            $subject->Subj_timein = $strDateTimein->format('H:i:s');
            $subject->Subj_timeout = $strDateTimeout->format('H:i:s');
            $arr1 = str_split($str, 3);
            for ($x = 0; $x < count($arr1); $x++) {
                if (strtolower($arr1[$x]) == strtolower('MON')){
                    $subject->Subj_dayM = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('TUE')){
                    $subject->Subj_dayT = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('WED')){
                    $subject->Subj_dayW = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('THU')){
                    $subject->Subj_dayTH = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('FRI')){
                    $subject->Subj_dayF = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('SAT')){
                    $subject->Subj_dayS = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('SUN')){
                    $subject->Subj_daySu = 1;
                }
            }

          $subject->Subj_title = $item['subj_title'];
          $subject->Subj_desc = $item['subj_desc'];
          $subject->Subj_units = $item['subj_units'];
          $subject->Subj_room = $item['subj_room'];
          $subject->Subj_yr_sec = $item['subj_yr_sec'];
          $subject->Prof_code = $profcode;
          $subject->save();

        }
        

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
