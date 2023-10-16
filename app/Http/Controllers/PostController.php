<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


use DB;
class PostController extends Controller
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
        $categories = DB::table('categories')->get();

        return view('create_post',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required|max:1000',
            'content'=>'required|max:5000',
            'category'=>'required',
            'image_post' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $user = Auth::user();
        if ($request->hasFile('image_post')) {

            $imagePost = $request->file('image_post');
            $imageName = time() . '.' . $imagePost->getClientOriginalExtension();
            $imagePath = 'image/post/' . $imageName;
            $imagePost->move(public_path('image/post'), $imageName);

            DB::table("posts")->insert([
                'who_post_id' => $user->id,
                'time_created' => now(),
                'time_update' => now(),
                'title' => $request->title,
                'content' => $request->content,
                'path_image' =>$imagePath,
                'category' =>$request->category,
            ]);
            return redirect('home')->with('success','Success Create New Kratooh.');
        }else{
            DB::table("posts")->insert([
                'who_post_id' => $user->id,
                'time_created' => now(),
                'time_update' => now(),
                'title' => $request->title,
                'content' => $request->content,
                'category' =>$request->category,
            ]);
            return redirect('home')->with('success','Success Create New Kratooh.');
        }
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $check = DB::table('posts')->select('who_post_id')->where('id_post', '=', $id)->first();
        if($user->id == $check->who_post_id){
            $post = DB::table('posts')->where('id_post', '=', $id)
                    ->Join('categories','category','=','categories.id_category')
                    ->get();
            $categories = DB::table('categories')->get();
            return view('edit_post',compact('post','categories'));
        }return view('test');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $check = DB::table('posts')->select('who_post_id')->where('id_post', '=', $id)->first();
        if($user->id == $check->who_post_id){

            $request->validate([

                'title'=>'required|max:1000',
                'content'=>'required|max:5000',
                'category'=>'required',
                'image_post' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);
            $user = Auth::user();
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
                    return redirect()->route('profile.show', ['id' =>$user->id])->with('success', 'Successful update Kratooh.');
                    
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

                return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'Successful update Kratooh.');

            }
        }return view('test');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $check = DB::table('posts')->select('who_post_id')->where('id_post', '=', $id)->first();
        if($user->id == $check->who_post_id){

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

            return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'Successful Delete Kratooh.');
        }
    }
}
