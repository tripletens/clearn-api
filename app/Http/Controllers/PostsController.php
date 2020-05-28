<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(40);
        // $post = Post::where('title', 'Sixth Post')->get();
        // $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }
    public function search(Request $request){
        // this filter can be author, title or just all ..  title by default
        $filter = $request->input('filter');
        $search_keyword = $request->input('keyword');
        switch ($filter) {
            case 'title':
                $search_query =
                    Post::where(
                        'title',
                        'like',
                        '%' . $search_keyword . '%'
                    )->orderBy('id', 'desc')->get();
                return view('posts.search-videos')->with('videos', $search_query);
                break;
            case 'author':
                $search_query =
                    User::where(
                        'name',
                        'like',
                        '%' . $search_keyword . '%'
                    )
                    ->orderBy('id', 'desc')
                    ->paginate(2);
                return view('posts.search-authors')->with('authors', $search_query);
                break;

            default:
            // searches by title by default
                $search_query =
                    Post::where(
                        'title',
                        'like',
                        '%' . $search_keyword . '%'
                    )

                    ->orderBy('id', 'desc')
                    ->paginate(5);
                return view('posts.search-videos')->with('videos', $search_query);
                break;
        }
        return $search_query;
        // echo $author; exit();
        // $search = Post::where('');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:20480000000'
        ]);

        $filenameWithsize = $request->file('video')->getClientSize();

        //Handle File Upload
        if($request->hasFile('video')){

            //Get just Filename with extension
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Video
            $path = $request->file('video')->storeAs('videos', $fileNameToStore);
            // $path = Storage::put('videos', $request->file('video'),$fileNameToStore);

        }

        //Create Posts
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = auth()->user()->id;
        $post->video = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect('/posts');
        }else{
            return view('posts.show')->with('post', $post);
        }
        // echo $post; exit();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unathorized Page');
        }

        return view('posts.edit')->with('post', $post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);


        //Handle File Upload
        if($request->hasFile('video')){

            //Get just Filename with extension
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Video
            $path = $request->file('video')->storeAs('videos', $fileNameToStore);

        }

        //Create Posts
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        if($request->hasFile('video')){
            $post->video = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unathorized Page');
        }

        Storage::delete('public/videos/'.$post->video);

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');

    }
}
