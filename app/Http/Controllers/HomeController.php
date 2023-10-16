<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Rule;


//use Illuminate\Support\Facades\DB;
use DB;

use App\Rules\PasswordRule;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        if (Auth::check()) {
            $this->middleware('auth');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $new_post = DB::table('posts')
        ->select('title','id_post','content','time_update','path_image','who_post_id','users.name','users.first_name','users.last_name','users.date_of_birth','users.path_pic_profile','categories.name_category')
        ->Join('users','who_post_id','=','users.id')
        ->Join('categories','category','=','categories.id_category')
        ->orderBy('time_update', 'desc')
        ->get();
       
        if (Auth::check()) {

            $user = Auth::user();
            $check = DB::table('users')->select('first_name','last_name','date_of_birth',)->where('id', '=', $user->id)->first();

            if($check->first_name==''||$check->last_name==''||$check->date_of_birth==''){
                $error = 'error';
                return view('home',compact('new_post','error'));
            }else{
                return view('home',compact('new_post'));
            }
        }else{
            return view('home',compact('new_post'));
        }
        
        

    }

      /*adminhome*
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = DB::table('users')
        ->select('id','name','email','created_at','path_pic_profile','first_name','last_name')
        ->where('is_admin', '=', '0')->get();
        return view('admin/adminHome',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function search(Request $request)
     {
        if (request('search')) {
            $searchTerm = $request->input('search');

            $posts = DB::table('posts')
            ->select('title','id_post','content','time_update','path_image','who_post_id','users.name','users.path_pic_profile','categories.name_category')
            ->Join('users','who_post_id','=','users.id')
            ->Join('categories','category','=','categories.id_category')
            ->where('name_category', 'LIKE', "%$searchTerm%")
            ->orWhere('title', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->get();
            
            return view('search', compact('posts'));
        }else{
            return view('search');

        }
        
         
     }
     /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\View\View
     */

     public function showResetForm()
     {
         return view('auth.passwords.reset1');
     }

     public function updatepassword(Request $request)
     {
        $request->validate([
            'old_password' => 'required|max:255',
            'password' => ['required','max:255', new PasswordRule],
            'password_confirmation' => 'required|max:255|same:password',
        ],
        [
            'password_confirmation.same'=> "password doesn't match"
        ]);
        $user = Auth::user();
        $hashedPassword = $user->password;
        if (Hash::check($request->input('old_password'), $hashedPassword)) {
            DB::table("users")
            ->where('id','=', $user->id)
            ->update([
                'password' =>Hash::make($request->password),
            ]);
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password changed successfully. You have been logged out.');
            
        } else {
            //echo "error";
            return redirect()->route('password.reset')->with('error',"Password is wrong");

        }
        
     }


        
}