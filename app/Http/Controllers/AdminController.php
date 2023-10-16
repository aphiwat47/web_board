<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Validation\Rule;


//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use DB;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
     {
        
        $this->middleware('auth');
        //$this->middleware('is_admin');
         
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
        
        $data = DB::table('users')->select('id','name', 'email', 'path_pic_profile','first_name','last_name','date_of_birth')->where('id', '=', $id)->get();
        $posts = DB::table('posts')->where('who_post_id', '=', $id)
            ->Join('categories','category','=','categories.id_category')
            ->orderBy('time_update', 'desc')->get();
        return view('admin/manageprofile',compact('data','posts'));
        
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editprofile(string $id)
    {
        $data = DB::table('users')->where('id', '=', $id)->get();
        return view('admin/ad_edit_profile',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateprofile(Request $request, string $id)
    {
        
        $request->validate([
            'name' => 'required|max:50',
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
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

        ],
        [
            'date_of_birth.before_or_equal'=> "Your date of birth doesn't seem correct. Please enter again.",
        ]
        );
    
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
            return redirect()->route('manage.profile', ['id' => $id])->with('success', 'Successful Update Profile.');
            
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
            return redirect()->route('manage.profile', ['id' => $id])->with('success', 'Successful Update Profile.');

        }
        return redirect()->route('manage.profile', ['id' => $id])->with('error', 'Fail To Update Profile.');
        
    }

    public function deluser(string $id)
    {
        
        $posts=DB::table("posts")
        ->where('who_post_id', '=', $id)
        ->get();
        //ลบโพสที่เป็นเจ้าของเเละเม้นทั้งหมดในโพส
        foreach ($posts as $post) {  

            $comments=DB::table("comments")
            ->where('id_comment_at_topic', '=', $post->id_post)
            ->get();

            foreach ($comments as $comment) {        
                if (File::exists(public_path($comment->path_pic_comm))) {
                    File::delete(public_path($comment->path_pic_comm));
                }
                DB::table("comments")
                ->where('id_comment','=',$comment->id_comment)
                ->delete(); 
            }

            if (File::exists(public_path($post->path_image))) {
                File::delete(public_path($post->path_image));
            }
            DB::table("posts")
            ->where('id_post','=',$post->id_post)
            ->delete();
        }
        
        //ลบเม้นที่เราเป็นเจ้าของ
        
        $comments = DB::table("comments")
        ->where('who_comm_id', '=', $id)
        ->get();
    
        foreach ($comments as $comment) { 

            if (File::exists(public_path($comment->path_pic_comm))) {
                File::delete(public_path($comment->path_pic_comm));
            }
            DB::table("comments")
            ->where('id_comment','=',$comment->id_comment)
            ->delete(); 
        }
        $userimage = DB::table('users')->select('path_pic_profile')->where('id', '=', $id)->first();
        if ($userimage->path_pic_profile != 'image/def/user.png' && File::exists(public_path($userimage->path_pic_profile))) {
            File::delete(public_path($userimage->path_pic_profile));
        }
        DB::table("users")
            ->where('id','=',$id)
            ->delete(); 
     
    return redirect()->route('admin.home')->with('success', 'Successful Delete User.');

    }

    ////////////////////////////////////POST/////////////////////////////
    
 
    public function editpost(string $id)
    {
        $post = DB::table('posts')->where('id_post', '=', $id)
        ->Join('categories','category','=','categories.id_category')
        ->get();
        $categories = DB::table('categories')->get();
        return view('admin/ad_edit_post',compact('post','categories'));
    }

    public function updatepost(Request $request, string $id)
    {
        $request->validate([

            'title'=>'required|max:1000',
            'content'=>'required|max:5000',
            'category'=>'required',
            'image_post' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $user = DB::table('posts')->select('who_post_id')->where('id_post', '=', $id)->first();
        if ($request->hasFile('image_post')) {
            //$post = DB::table('posts')->select('path_image')->where('id_post', '=', $id)->get();
            $post1 = DB::table('posts')->select('path_image')->where('id_post', '=', $id)->first();
            //echo $post1->path_image;
            if (File::exists(public_path($post1->path_image))) {
                
                File::delete(public_path($post1->path_image));

                $imagePost = $request->file('image_post');
                $imageName = time() . '.' . $imagePost->getClientOriginalExtension();
                $imagePath = 'image/post/' . $imageName;
                $imagePost->move(public_path('image/post'), $imageName);
                
                DB::table("posts")
                ->where('id_post','=',$id)
                ->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'path_image' =>$imagePath,
                    'time_update' => now(),
                    'category' =>$request->category,
                ]);
                return redirect()->route('manage.profile', ['id' =>$user->who_post_id])->with('success', 'Successful Update Kratooh.');
                
            }
        
        }else {
            DB::table("posts")
            ->where('id_post', '=', $id)
            ->update([
                'title' => $request->title,
                'content' => $request->content, 
                'time_update' => now(),
                'category' =>$request->category,
            ]);

            return redirect()->route('manage.profile', ['id' => $user->who_post_id])->with('success', 'Successful Update Kratooh.');

        }

    }
     /**
     * Remove the specified resource from storage.
     */
    public function deletepost(string $id)
    {
        $comments=DB::table("comments")
                ->where('id_comment_at_topic', '=', $id)
                ->get();

        foreach ($comments as $comment) {        
            if (File::exists(public_path($comment->path_pic_comm))) {
                File::delete(public_path($comment->path_pic_comm));
            }
            DB::table("comments")
            ->where('id_comment','=',$comment->id_comment)
            ->delete(); 
        }

        $post = DB::table('posts')->select('path_image','who_post_id')->where('id_post', '=', $id)->first();
        if (File::exists(public_path($post->path_image))) {
            File::delete(public_path($post->path_image));
        }
        DB::table("posts")
        ->where('id_post','=',$id)
        ->delete();

        return redirect()->route('manage.profile', ['id' => $post->who_post_id])->with('success', 'Successful Delete Kratooh.');
  
    }

     ////////////////////////////////////COMMENT/////////////////////////////

    public function managecomm(string $id)
    {
        
        $post = DB::table('posts')
        ->select('title','id_post','content','time_update','path_image','who_post_id','users.name','users.path_pic_profile','categories.name_category')
        ->Join('users','who_post_id','=','users.id')
        ->Join('categories','category','=','categories.id_category')
        ->where('id_post', '=', $id)
        ->get();
        $comments = DB::table('comments')
        ->select('id_comment','path_pic_comm','time_update','comment','who_comm_id','users.name','users.path_pic_profile')
        ->Join('users','who_comm_id','=','users.id')
        ->where('id_comment_at_topic', '=', $id)
        ->orderBy('time_update', 'desc')
        ->get();
        return view('admin/ad_manage_comm',compact('post','comments'));
        
      
    } 
     /**
     * Show the form for editing the specified resource.
     */
    public function editcomm(string $id)
    {
        $comment = DB::table('comments')->where('id_comment', '=', $id)->get();
        return view('admin/ad_edit_comment',compact('comment'));

    }
     /**
     * Update the specified resource in storage.
     */
    public function updatecomm(Request $request, string $id)
    {

        $request->validate([
            'comment'=>'required|max:255',
            'image_comment' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        //$user = DB::table('comments')->select('id_comment_at_topic')->where('id_comment', '=', $id)->first();
        $comm = DB::table('comments')->select('path_pic_comm','id_comment_at_topic')->where('id_comment', '=', $id)->first();
        if ($request->hasFile('image_comment')) {
            if (File::exists(public_path($comm->path_pic_comm))) {
                File::delete(public_path($comm->path_pic_comm));

                $imageComment = $request->file('image_comment');
                $imageName = time() . '.' . $imageComment->getClientOriginalExtension();
                $imagePath = 'image/comment/' . $imageName;
                $imageComment->move(public_path('image/comment'), $imageName);
    
                
                DB::table("comments")
                ->where('id_comment','=',$id)
                ->update([
                    'time_update' => now(),
                    'comment' => $request->comment,
                    'path_pic_comm' =>$imagePath,
                ]);
                return redirect()->route('ad.manage.comm', ['id' =>$comm->id_comment_at_topic])->with('success', 'Successful Update Comment.');
                
            }
        }else {
            DB::table("comments")
            ->where('id_comment', '=', $id)
            ->update([
                'time_update' => now(),
                'comment' => $request->comment,
            ]);
            return redirect()->route('ad.manage.comm', ['id' =>$comm->id_comment_at_topic])->with('success', 'Successful Update Comment.');


        }
    
    }

     /**
     * Remove the specified resource from storage.
     */
    public function deletecomm(string $id)
    {
       
       
        $comm = DB::table('comments')->select('path_pic_comm','id_comment_at_topic')->where('id_comment', '=', $id)->first();
        if (File::exists(public_path($comm->path_pic_comm))) {
            File::delete(public_path($comm->path_pic_comm));
        }
        DB::table("comments")
        ->where('id_comment','=',$id)
        ->delete();

        //ไปmethod index
        return redirect()->route('ad.manage.comm', ['id' =>$comm->id_comment_at_topic])->with('success', 'Successful Delete Comment.');
   
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function categoryhome()
    {
        $categories = DB::table('categories')->get();
        return view('admin/categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categorycreate()
    {
        return view('admin/create_categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categorystore(Request $request)
    {
        $request->validate([
            'category'=>'required|max:100',
        ]);
        DB::table("categories")->insert([
            'name_category' => $request->category,
           
        ]);
        return redirect()->route('category.home')->with('success','Success Create New Category .');
    }

    public function categoryedit(string $id)
    {
        $categories = DB::table('categories') ->where('id_category','=',$id)->get();
        return view('admin/edit_categories',compact('categories'));

    }
    public function categoryupdate(Request $request, string $id)
    {
        $request->validate([
            'category'=>'required|max:100',
        ]);
        DB::table("categories")
        ->where('id_category', '=', $id)
        ->update([
            'name_category' => $request->category,   
        ]);
        return redirect()->route('category.home')->with('success','Success Update Category.');
    }

    public function searchadmin(Request $request)
     {
        if (request('search')) {
            $searchTerm = $request->input('search');

            $posts = DB::table('posts')
            ->select('title','id_post','content','time_update','path_image','who_post_id','users.id','users.name','users.path_pic_profile','categories.name_category')
            ->Join('users','who_post_id','=','users.id')
            ->Join('categories','category','=','categories.id_category')
            ->where('name_category', 'LIKE', "%$searchTerm%")
            ->orWhere('title', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('id', 'LIKE', "%$searchTerm%")
            ->get();

            $users = DB::table('users')
            ->where('id', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('email', 'LIKE', "%$searchTerm%")
            ->get();
           
            return view('admin/admin_search', compact('posts','users'));


        }else{
            return view('admin/admin_search');

        }
        
         
     }
}
