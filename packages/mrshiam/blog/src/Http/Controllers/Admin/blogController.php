<?php

namespace mrshiam\blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mrshiam\Blog\Models\Blog;

class blogController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['blogs'] = Blog::orderBy('id','DESC')->paginate(10);
        $data['serial'] = managePaginationSerial($data['blogs']);
        return view('blog::admin.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blog::admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'writer_name' => 'required',
            'blog_title' => 'required',
            'details' => 'required',
        ]);

        $data = $request->all();
//        dd($data);
        if($request->hasFile('image')){
            $data['image'] = $this->fileUpload($request->image);
        }
//        dd($data);
        Blog::create($data);
        session()->flash('message','Post Added Successfully');
      return redirect()->route('admin.blog.index');
    }
    private function fileUpload($img)
    {
        $path = 'uploads/posts';
        $file_name = time().rand(00000,99999).'.'.$img->getClientOriginalExtension();
        $img->move($path, $file_name);
        $fullPath = $path . '/' . $file_name;
        return $fullPath;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $data['blog'] = Blog::findOrFail($id);
        return view('blog::admin.blog.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data['blog'] = Blog::findOrFail($id);
        return view('blog::admin.blog.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'writer_name' => 'required',
            'blog_title' => 'required',
            'details' => 'required',
        ]);

        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = $this->fileUpload($request->image);
        }
//        dd($data);
        Blog::findOrFail($id)->update($data);
        session()->flash('message', 'Blog Updated Successfully');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        session()->flash('message', 'Blog Deleted Successfully');
        return redirect()->route('admin.blog.index');
    }
}
