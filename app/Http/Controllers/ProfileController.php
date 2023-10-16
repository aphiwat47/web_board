<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Rules\ValidBirthdate;


use DB;

use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        if($user->id == $id){
            $data = DB::table('users')->select('name', 'email', 'path_pic_profile','first_name','last_name','date_of_birth')->where('id', '=', $id)->get();
            $posts = DB::table('posts')->where('who_post_id', '=', $id)
                ->Join('categories','category','=','categories.id_category')
                ->orderBy('time_update', 'desc')->get();
            return view('profile',compact('data','posts'));
        }
        return view('test');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        if($user->id == $id){
            $data = DB::table('users')->where('id', '=', $id)->get();
            return view('edit_profile',compact('data'));
        }
        return view('test');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        if($user->id == $id){
            if($user->name==$request->name){
                $request->validate([
                    'name' => ['required','string', 'max:50'],
                    'fname' => ['required','max:50'],
                    'lname' => ['required','max:50'],
                    'date_of_birth' => [
                        'required',
                        'date',
                        'before_or_equal:today',
                        function ($attribute, $value, $fail) {
                            $birthdate = \Carbon\Carbon::parse($value);
                            $age = $birthdate->age;
                            if ($age < 18) {
                                $fail('You must be at least 18 years old.');
                            }elseif ($age > 120){
                                $fail('Are you sure? that you are over 120 years old');
                            }
                        },
                       
                    ],
                    'image_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
                    ] ,
                [
                    'date_of_birth.before_or_equal'=> "Your date of birth doesn't seem correct. Please enter again.",
                ]
            
                );

            }
            else{
                $request->validate([
                    'name' => ['required','string', 'max:50','unique:users'],
                    'fname' => ['required','max:50'],
                    'lname' => ['required','max:50'],
                    'date_of_birth' => [
                        'required',
                        'date',
                        'before_or_equal:today',
                        function ($attribute, $value, $fail) {
                            $birthdate = \Carbon\Carbon::parse($value);
                            $age = $birthdate->age;
                            if ($age < 18) {
                                $fail('You must be at least 18 years old.');
                            }elseif ($age > 120){
                                $fail('Are you sure? that you are over 120 years old');
                            }
                        },
                    
                    ],
                    'image_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
                    ] ,
                [
                    'date_of_birth.before_or_equal'=> "Your date of birth doesn't seem correct. Please enter again.",
                ]
            
                );
            }
        
            $user = Auth::user();
        
            if ($request->hasFile('image_profile')) {
                if ($user->path_pic_profile != 'image/def/user.png' && File::exists(public_path($user->path_pic_profile))) {
                    File::delete(public_path($user->path_pic_profile));
                    
                }
                $imageProfile = $request->file('image_profile');
                $imageName = time() . '.' . $imageProfile->getClientOriginalExtension();
                $imagePath = 'image/profile/' . $imageName;
                $imageProfile->move(public_path('image/profile'), $imageName);

                DB::table("users")
                ->where('id','=',$id)
                ->update([
                    'name' => $request->name,
                    'path_pic_profile' => $imagePath,
                    'updated_at' => now(),
                    'first_name' => $request->fname,
                    'last_name' => $request->lname,
                    'date_of_birth' => $request->date_of_birth,

                ]);
                /*
                $user->name = $request->name;
                $user->path_pic_profile = $imagePath;
                $user->updated_at = now();
                $user->save();*/
                return redirect()->route('profile.show', ['id' => $id])->with('success', 'Successful Update Profile.');
                
            }else{
                DB::table("users")
                ->where('id','=',$id)
                ->update([
                    'name' => $request->name,
                    'updated_at' => now(),
                    'first_name' => $request->fname,
                    'last_name' => $request->lname,
                    'date_of_birth' => $request->date_of_birth,
                ]);
                return redirect()->route('profile.show', ['id' => $id])->with('success', 'Successful Update Profile.');

            }
            return redirect()->route('profile.show', ['id' => $id])->with('error', 'Fail To Update Profile.');
        }
        return view('test');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}