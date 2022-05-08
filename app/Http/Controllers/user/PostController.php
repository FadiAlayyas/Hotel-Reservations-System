<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\controller;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Hotel;
class PostController extends Controller
{
    public function index()
    {
        $hotelInfo=Hotel::all();
        $contacts=Contact::all();
        $posts = Post::where('verfied', 1)->orderBy('id', 'DESC')->get();
        return view('user.post.index', compact('posts','hotelInfo','contacts'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image',
            'rate' => 'required',
            'opinion' => 'required',
        ]);
        $photo = $request->image;
        $newPhoto = time() . $photo->getClientOriginalName();
        $photo->move('upload/posts', $newPhoto);
        $post = Post::create([
            'user_id' => Auth::id(),
            'image' => 'upload/posts/' . $newPhoto,
            'rate' => $request->rate,
            'opinion' => $request->opinion,
        ]);
        return redirect()->route('post.index');
    }
    public function edit($id)
    {
        $hotelInfo=Hotel::all();
        $contacts=Contact::all();
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        return view('user.settings.editmemo',compact('post','hotelInfo','contacts'));
    }
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $this->validate($request,[
            'opinion'=>'required',
            'rate'=>'required'
           ]);

           if($request->has('image')&& $request->image!=null){
            $photo=$request->image;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('upload/posts',$newPhoto);
            $post->image='upload/posts/'.$newPhoto;
           }

           $post->opinion=$request->opinion;
           $post->rate=$request->rate;
           $post->save();

        return redirect()->back()->with("success","Post information updated successfully");
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        $post->delete();
        return redirect()->back();
    }


    public function like(Request $request)
    {
        if ($request->ajax()) {
            $like_status = $request->get('like_status');
            $post_id = $request->get('post_id');
            $like = like::where('post_id', $post_id)->where('user_id', Auth::id())->first();
            if (!$like) {

                Like::create([
                    'user_id' => Auth::id(),
                    'post_id' => $post_id,
                    'like' => 1,
                ]);
                $is_like=1;
            } elseif ($like->like == 1) {
                DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::id())->delete();
                $is_like=0;
            } elseif ($like->like == 0) {
                $Like = Like::find($like->id);
                $Like->like = 1;
                $Like->save();
                $is_like=2;
            }

            $data = array('is_like'  => $is_like);
            return Response($data);
        }
    }


    public function dislike(Request $request)
    {
        if ($request->ajax()) {
            $like_status = $request->get('like_status');
            $post_id = $request->get('post_id');

            $dislike = like::where('post_id', $post_id)->where('user_id', Auth::id())->first();
            if (!$dislike) {

                Like::create([
                    'user_id' => Auth::id(),
                    'post_id' => $post_id,
                    'like' => 0,
                ]);
                $is_dislike=1;
            } elseif ($dislike->like == 0) {
                DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::id())->delete();
                $is_dislike=0;
            } elseif ($dislike->like == 1) {
                $Like = Like::find($dislike->id);
                $Like->like = 0;
                $Like->save();
                $is_dislike=2;
            }

            $data = array('is_dislike'  => $is_dislike);
            return Response($data);
        }
    }

    public function showMemories()
    {
        $hotelInfo = Hotel::all();
        $contacts = Contact::all();
        $posts = Post::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('user.settings.showmemo', compact('hotelInfo', 'contacts', 'posts'));
    }

}
