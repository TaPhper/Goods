<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Slide;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slide::paginate(5);
        $count = Slide::count();
        // dump($count);
        return view('admin.slide.index',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 检测文件上传
        if($request->hasFile('slide_img')){
            $profile = $request->file('slide_img');
            $img = $profile->store('images'); //执行上传
            // dump($img);
            // images/bypMOoKifUsU8y5PGh0JfgEnDLJIPxCINS1Ai3Z8.jpeg
            $data = $request -> except('_token');
            // dump($data);
            $slide = new Slide;
            $slide->slide_img = $img;
            $slide->slide_status = $data['slide_status'];
            $slide->slide_url = $data['slide_url'];
            $res = $slide->save();
            if($res){
                return redirect('admin/slide')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
         }else{
            return back()->with('error','请上传图片');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);
        $data = $slide->slide_status == 1 ? '2' : 1;
        $slide->slide_status = $data;
        $res = $slide->save();
        if($res){
            return redirect('admin/slide')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit',['slide'=>$slide]);
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
        if($request->hasFile('slide_img')){
            $profile = $request->file('slide_img');
            $img = $profile->store('images'); //执行上传
            // dump($img);
            // images/bypMOoKifUsU8y5PGh0JfgEnDLJIPxCINS1Ai3Z8.jpeg
            $data = $request -> except('_token');
            // dump($data);
            $slide = Slide::find($id);
            $slide->slide_img = $img;
         }else{
            $data = $request -> except('_token');
            // dump($data);
            $slide = Slide::find($id);     
        }
        $slide->slide_status = $data['slide_status'];
        $slide->slide_url = $data['slide_url'];
        $res = $slide->save(); 
        if($res){
            return redirect('admin/slide')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $res = $slide->delete;
        if($res){
            return redirect('admin/slide')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
