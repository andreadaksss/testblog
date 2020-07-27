<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Posts;
use App\User;
use Exception;

class PostController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view("blog/create");
    }


    public function store(Request $request)
    {
        $id = Auth::id();
        $validate = Validator::make($request -> input(), [
			'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
		]);

		if($validate -> fails()){
		 	return redirect('/blog/create')-> withInput()-> withErrors($validate);
        }

        else{
            $data = $request->input();
			try{
                $post = new Posts;
                $post->user_id = $id;
                $post->post_title = $data['title'];
                $post->post_content = $data['content'];
				$post->save();
				return "Insert successfully";
			}
			catch(Exception $e){
				return "Insert failed";
			}
        }

    }


    public function show($id)
    {
        ////$contacts = Contact::Where('tenant_id', "1")->get();
        // Session::flash('flash_message', 'Task successfully added!');
    }

    public function show_all(){

        // $posts = Posts::all();
        $posts = Posts::with('user')->get();
        // $writer = User::where(['id' => 1])->first()->name;
        return view('blog/show', ['posts' => $posts]);
    }


    public function edit($id)
    {

        // $post = Posts::where('post_id', $id)->get()->post_title;
        // $post = Posts::find($id);
        // return view('blog/edit/'+ $id, compact('post'));

        $post = Posts::where('post_id', $id)->first();
        return view('blog.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $permission = Posts::where('post_id', $id)->first();
        if($permission->user_id == Auth::id()){
            // return "You are the creator, you are verified to update!";
            $data = $request->input();
            $validate = Validator::make($data, [
			'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            ]);

            if($validate -> fails()){
                return redirect('blog.edit')-> withInput()-> withErrors($validate);
            }else{
                try{
                    $post = Posts::where('post_id', $id)->update([
                        'post_title' => $data['title'],
                        'post_content' => $data['content']
                    ]);
                    return 'Successfully updated blog!';
                }
                catch(Exception $e){
                    return "Update failed";
                    }
            }
        }else{
            return "You are not auhtorized to update blog!";
        }

    }


    public function destroy($id)
    {
        $permission = Posts::where('post_id', $id)->first();
            if ($permission->user_id == Auth::id()) {
                $post = Posts::where('post_id', $id)->delete();
                return 'Successfully deleted blog!';
            }else{
                return "You are not auhtorized to delete blog!";
            }

    }
}
