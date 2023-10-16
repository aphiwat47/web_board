<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\File;
class CommentController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(string $id)
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
        return view('comment',compact('post','comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('create_comment',compact('id'));
        //echo $id;
        /*if (Auth::check()) {
            return view('create_comment',compact('id'));
        }
        return redirect()->route('login');*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
       
        $request->validate([

            'comment'=>'required|max:255',
            'image_comment' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $user = Auth::user();
        if ($request->hasFile('image_comment')) {

            $imageComment = $request->file('image_comment');
            $imageName = time() . '.' . $imageComment->getClientOriginalExtension();
            $imagePath = 'image/comment/' . $imageName;
            $imageComment->move(public_path('image/comment'), $imageName);

            DB::table("comments")->insert([
                'who_comm_id' => $user->id,
                'id_comment_at_topic' => $id,
                'time_created' => now(),
                'time_update' => now(),
                'comment' => $request->comment,
                'path_pic_comm' =>$imagePath,
            ]);
            return redirect()->route('comment.index', ['id' =>$id])->with('success', 'Successful Create Comment.');
        }else{
            DB::table("comments")->insert([
                'who_comm_id' => $user->id,
                'id_comment_at_topic' => $id,
                'time_created' => now(),
                'time_update' => now(),
                'comment' => $request->comment,
            ]);
            return redirect()->route('comment.index', ['id' =>$id])->with('success', 'Successful Create Comment.');
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
        $comm = DB::table('comments')->select('who_comm_id')->where('id_comment', '=', $id)->first();
        if($user->id == $comm->who_comm_id){
            $comment = DB::table('comments')->where('id_comment', '=', $id)->get();
            return view('edit_comment',compact('comment'));
        }else{
            return view('test');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $comm = DB::table('comments')->select('who_comm_id')->where('id_comment', '=', $id)->first();
        if($user->id == $comm->who_comm_id){

            $request->validate([
                'comment'=>'required|max:255',
                'image_comment' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);

            $user = Auth::user();
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
                    return redirect()->route('comment.index', ['id' =>$comm->id_comment_at_topic])->with('success', 'Successful Update Comment.');
                    
                }
            }else {
                DB::table("comments")
                ->where('id_comment', '=', $id)
                ->update([
                    'time_update' => now(),
                    'comment' => $request->comment,
                ]);
                return redirect()->route('comment.index', ['id' =>$comm->id_comment_at_topic])->with('success', 'Successful Update Comment.');


            }
        }
        return view('test');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //echo "debug";
        $user = Auth::user();
        $comm = DB::table('comments')->select('who_comm_id')->where('id_comment', '=', $id)->first();
        if($user->id == $comm->who_comm_id){
            $comm = DB::table('comments')->select('path_pic_comm','id_comment_at_topic')->where('id_comment', '=', $id)->first();
            if (File::exists(public_path($comm->path_pic_comm))) {
                File::delete(public_path($comm->path_pic_comm));
            }
            DB::table("comments")
            ->where('id_comment','=',$id)
            ->delete();

            //ไปmethod index
            return redirect()->route('comment.index', ['id' =>$comm->id_comment_at_topic])->with('success', 'Successful Delete Comment.');
        }
        return view('test');
    }
    
   
}
