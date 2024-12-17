<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection\sortBy;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('pages.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $blog = Blog::with('categoryBlogs','users')->latest()->get();
        
        return datatables()
            ->of($blog)
            ->addIndexColumn()
            ->addColumn('publish', function ($blog) {
                if ($blog->publish == 1) {
                    return 'Publish';
                } else {
                    return 'Not Publish';
                }
            })
            ->addColumn('aksi', function ($blog) {
                return '
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="' . route('blog.edit', $blog->id) . '">Edit</a></li>
                            <li><a class="dropdown-item" href="' . route('blog.show', $blog->id) . '">Show</a></li>
                            <li><button class="dropdown-item" onclick="deleteData(`' . route('blog.destroy', $blog->id) . '`)">Delete</button></li>                            
                        </ul>
                    </div>
                    ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    
    public function create()
    {
        $categoryBlogs = Category::all();
        $users = User::all();
        return view('pages.blog.create', compact('categoryBlogs', 'users'));
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
            'category_id' => 'required',
            'author_id'        => 'required',
            'title'            => 'required',
            'content'          => 'required',
            'seo_title'        => 'required',
            'seo_description'  => 'required',
            'publish'          => 'required',
        ]);
       
        $blog = new Blog();
        $blog->category_id = $request->category_id;
        $blog->author_id = $request->author_id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->publish = $request->publish;
        
        if ($request->hasFile('feature_image')) {

            // validasi gambar
            $this->validate($request, [
                'feature_image' => 'required',
            ]);
            
            $image = $request->file('feature_image');
            
            //name file
            $imagename = $image->getClientOriginalName();
            $a = explode(".", $imagename);
            $fileExt = strtolower(end($a));  
            $namaFile = substr(md5(date("YmdHis")),0,10).".".$fileExt;

            //penyimpanan
            $destination_path= public_path().'/feature_image/';

            // simpan ke folder
            $request->file('feature_image')->move($destination_path,$namaFile);
            // simpan database
            $blog->feature_image = $namaFile;
            
        }

        $input = $request->all();
    	
        $blog->save();
        $tags = explode(",", $request->tags);
    	$blog->tag($tags);
        
        return redirect()->route('blog.index')->with('success', 'Data Blog Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryBlogs = Category::all();
        $users = User::all();
        $blog = Blog::findOrFail($id);
        $tags = $blog->tagNames();
        return view('pages.blog.edit', compact('blog', 'categoryBlogs', 'users','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            
            'category_id'  => 'required',
            'author_id'     => 'required',
            'title'  => 'required',
            'content'  => 'required',
            'seo_title'     => 'required',
            'seo_description'     => 'required',
            'publish'     => 'required',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->category_id = $request->category_id;
        $blog->author_id = $request->author_id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->publish = $request->publish;

        if ($request->hasFile('feature_image')) {
            
            //validasi gmabar
            $this->validate($request, [
                'feature_image' => 'required',
            ]);
            
            $image = $request->file('feature_image');
            
            //name file
            $imagename = $image->getClientOriginalName();
            $a = explode(".", $imagename);
            $fileExt = strtolower(end($a));  
            $namaFile = substr(md5(date("YmdHis")),0,10).".".$fileExt;

            //penyimpanan
            $destination_path= public_path().'/feature_image/';

            // simpan ke folder
            $request->file('feature_image')->move($destination_path,$namaFile);

            //delete old file thumbnail
            // unlink(public_path().'/feature_image/'.$blog->feature_image);

            // simpan database
            $blog->feature_image = $namaFile;
            
        }
        
        $blog->update();
        $blog->retag($request->input('tags'));
        return redirect()->route('blog.index')->with('success', 'Data Blog Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        unlink(public_path().'/feature_image/'.$blog->feature_image);
        $blog->delete();

        return response(null, 204);
    }
}