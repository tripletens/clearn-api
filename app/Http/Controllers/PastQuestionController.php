<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PastQuestions;
use App\Topics;
use App\Courses;
class PastQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        //
        // `title`, `course_id`, `topic_id`, `author_id`,
        //  `pdf`, `image1`, `image2`, `image3`,
        $questions = PastQuestions::orderBy('id','desc')->paginate(40);
        return view('past-questions.index')->with(['questions'=>$questions]);
    }
    public function search(Request $request)
    {
        // this filter can be author, title or just all ..  title by default
        $filter = $request->input('filter');
        $search_keyword = $request->input('keyword');
        switch ($filter) {
            case 'title':
                $search_query =
                    PastQuestions::where(
                        'title',
                        'like',
                        '%' . $search_keyword . '%'
                    )->orderBy('id', 'desc')->get();
                return view('past-questions.search-past-questions')->with('questions', $search_query);
                break;
            case 'author':
                $search_query =
                    User::where(
                        'name',
                        'like',
                        '%' . $search_keyword . '%'
                    )
                    ->orderBy('id', 'desc')
                    ->get();
                foreach ($search_query as $key) {
                    # code...
                    $match = PastQuestions::where('author_id',$key->id)->get();
                    if($match == null){
                        $search_query = null;
                    }else{
                        $search_query = $match;
                    }
                }
                return view('past-questions.search-author')->with('authors', $search_query);
                break;
            case 'topic':
                $search_query =
                    Topics::where(
                        'title',
                        'like',
                        '%' . $search_keyword . '%'
                    )
                    ->orderBy('id', 'desc')
                    ->get();
                foreach ($search_query as $key) {
                    # code...
                    $match = PastQuestions::where('topic_id',$key->id)->get();
                    if($match == null){
                        $search_query = null;
                    }else{
                        $search_query = $match;
                    }
                }
                return view('past-questions.search-topic')->with('topics', $search_query);
                break;
            case 'course':
                $search_query =
                    Courses::where(
                        'title',
                        'like',
                        '%' . $search_keyword . '%'
                    )
                    ->orderBy('id', 'desc')
                    ->get();
                foreach ($search_query as $key) {
                    # code...
                    $match = PastQuestions::where('course_id', $key->id)->get();
                    if ($match == null) {
                        $search_query = null;
                    } else {
                        $search_query = $match;
                    }
                }
                return view('past-questions.search-course')->with('courses', $search_query);
                break;

            default:
                // searches by title by default
                $search_query =
                    PastQuestions::where(
                        'title',
                        'like',
                        '%' . $search_keyword . '%'
                    )

                    ->orderBy('id', 'desc')
                    ->paginate(5);
                return view('past-questions.search-past-questions')->with('questions', $search_query);
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
    public function create(Request $request)
    {
        // fetch all the topics
        $topics = Topics::all();
        // fetch all the courses
        $courses = Courses::all();

        $data = [
            'topics' => $topics,
            'courses' => $courses
        ];

        return view('past-questions.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'pdf' => 'required|mimes:pdf,doc,docx|max:50000',
        //     'image1.*' => 'required|mimetypes:jpeg,jpg,png|max:50000'
        //     // only one image is compulsory
        // ]);
        // echo var_dump($request->all());exit();
        // echo var_dump($request->file('image1')->getClientOriginalExtension()); exit();
        // let's upload the image(s)

        // $filenameWithsize = $request->file('image')->getClientSize();

        //Handle File Upload for the first image
        if ($request->hasFile('image1')) {

            //Get just Filename with extension
            $image1filenameWithExt = $request->file('image1')->getClientOriginalName();
            //Get just Filename
            $image1filename = pathinfo($image1filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $image1extension = $request->file('image1')->getClientOriginalExtension();
            $image1fileNameToStore = $image1filename . '_' . time() . '.' . $image1extension;

            //Upload image1
            $image1path = $request->file('image1')->storeAs('past_questions_images', $image1fileNameToStore);
            // $path = Storage::put('videos', $request->file('video'),$fileNameToStore);
        }

        //Handle File Upload for the second image
        if ($request->hasFile('image2')) {

            //Get just Filename with extension
            $image2filenameWithExt = $request->file('image2')->getClientOriginalName();
            //Get just Filename
            $image2filename = pathinfo($image2filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $image2extension = $request->file('image2')->getClientOriginalExtension();
            $image2fileNameToStore = $image2filename . '_' . time() . '.' . $image2extension;

            //Upload image2
            $image2path = $request->file('image2')->storeAs('past_questions_images', $image2fileNameToStore);
            // $path = Storage::put('videos', $request->file('video'),$fileNameToStore);

        }
        //Handle File Upload for the third image
        if ($request->hasFile('image3')) {

            //Get just Filename with extension
            $image3filenameWithExt = $request->file('image3')->getClientOriginalName();
            //Get just Filename
            $image3filename = pathinfo($image3filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $image3extension = $request->file('image3')->getClientOriginalExtension();
            $image3fileNameToStore = $image3filename . '_' . time() . '.' . $image3extension;

            //Upload image3
            $image3path = $request->file('image3')->storeAs('past_questions_images', $image3fileNameToStore);
            // $path = Storage::put('videos', $request->file('video'),$fileNameToStore);
        }

        //Handle File Upload for the first image
        if ($request->hasFile('pdf')) {

            //Get just Filename with extension
            $pdffilenameWithExt = $request->file('pdf')->getClientOriginalName();
            //Get just Filename
            $pdffilename = pathinfo($pdffilenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $pdfextension = $request->file('pdf')->getClientOriginalExtension();
            $pdffileNameToStore = $pdffilename . '_' . time() . '.' . $pdfextension;

            //Upload pdf
            $pdfpath = $request->file('pdf')->storeAs('past_questions_images', $pdffileNameToStore);
            // $path = Storage::put('videos', $request->file('video'),$fileNameToStore);

        }else{
            echo 'error';exit();
        }
        //Create Past Queestions
           //
        // `title`, `course_id`, `topic_id`, `author_id`, `pdf`, `image1`,
        //  `image2`, `image3`,
        $past_question = new PastQuestions;
        $past_question->title = $request->input('title');
        $past_question->course_id = $request->input('course_id');
        $past_question->topic_id = $request->input('topic_id');
        $past_question->author_id = auth()->user()->id;
        $past_question->pdf = $pdffileNameToStore;
        $past_question->image1 = $image1fileNameToStore;

        if($image2fileNameToStore == ''){
            $image2fileNameToStore = null;
        }
        if ($image3fileNameToStore == '') {
            $image3fileNameToStore = null;
        }
        $past_question->image2 = $image2fileNameToStore;
        $past_question->image3 = $image3fileNameToStore;
        $past_question->save();

        return redirect('/past-questions')->with('success', 'Past Question Uploaded Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $question = PastQuestions::find($id);

        return view('past-questions.show')->with(['question' => $question]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
