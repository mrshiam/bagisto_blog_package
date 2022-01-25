<?php

namespace Mrshiam\Blog\Http\Controllers\Shop;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Mrshiam\Blog\Models\Blog;
class blogController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

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
        return view('blog::shop.blog.index',$data);
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
        return view('blog::shop.blog.show', $data);
    }
}
