<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.category.index');
    }

    public function data()
    {
        $category = Category::orderBy('id', 'desc')->get();

        return datatables()
            ->of($category)
            ->addIndexColumn()
            ->addColumn('aksi', function ($category) {
                return '
                <div class="btn-group">
                    <button onClick="edit('.$category->id.')" class="btn btn-sm btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`' . route('category-blog.destroy', $category->id) . '`)" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =array(
            'name'   => 'required',
            'published'   => 'required',
        );

      
        
        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(["status"=>"error","message"=>$errors[0]], 200);
        }
        
        $category = Category::create([
            'name' => $request->name,
            'published' => $request->published,

        ]);


        if ($category) {
            return response()->json(["status"=>"success","message"=>'Category  Added!'], 200);
        }
        
       
    }

    public function edit($id)
    {   
        $category  = Category::find($id);
        return Response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =array(
            'name'   => 'required',
            'published'   => 'required',
        );

      
        
        $validator=Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(["status"=>"error","message"=>$errors[0]], 200);
        }
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->published = $request->published;
        $category->update();
      
        // return response()->json('Data berhasil disimpan', 200);
        return response()->json(["status"=>"success","message"=>'Category  Updated!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response(null, 204);
    }
}