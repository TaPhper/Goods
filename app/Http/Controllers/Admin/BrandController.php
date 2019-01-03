<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::paginate(5);

        $res = Brand::count();
               //返回品牌列表页面
        return view('admin.brand.index',['brand'=>$data,'res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回品牌添加页面
        return view('admin.brand.create');
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
        if($request->hasFile('blogo')){
            $profile = $request->file('blogo');
            $res = $profile->store('images'); //执行上传
            $brand = new Brand;
            $data = $request->except(['_token','blogo']);
            $brand->brand_name = $data['bname'];
            $brand->brand_is_show = $data['bstatus'];
            $brand->brand_describlle = $data['bcontent'];
            $brand->brand_logo =$res;
            $brand->save();

            return redirect('/admin/brand')->with('success','添加成功');
         }else{
            return back()->with('error','文件上传失败或文件太大');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = brand::find($id);
        // dump($data->brand_id);die;
        return view('admin.brand.edit',['data'=>$data]);
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
        dump($request->file('blogo'));die;
        $data = $request->except(['_token','_method']);
        // dump($data);die;
        $brand =brand::find($id);
        $brand->brand_name = $data['bname'];
        $brand->brand_is_show = $data['bstatus'];
        $brand->brand_describlle = $data['bcontent'];
        if($request->hasFile('blogo')){
            $profile = $request->file('blogo');
            $res = $profile->store('images'); //执行上传
            $brand->brand_logo = $res;
        }
        $res = $brand->save();

        if($res){
            return back()->with('success','修改成功');
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

        
        $data = Brand::destroy($id);
        if($data){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
