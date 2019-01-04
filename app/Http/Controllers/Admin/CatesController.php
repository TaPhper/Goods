<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CatesController extends Controller
{
    public static function getCates()
    {
        // $data = DB::table('cates')->get();
        // $data = DB::select("select *,concat(path,',',id) as paths from cates order by paths asc");
        $data = DB::table('type')->select('*',DB::raw("concat(p_path,',',type_id) as paths"))->orderBy('paths','asc')->get();
        foreach ($data as $key => $value) {
            // 统计， 出现的次数
            $n = substr_count($value->p_path,',');
            $data[$key]->type_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$n).'|---'.$value->type_name;
        }
        return $data;
    }
    public static function getCname($cates=[],$id=0)
    {
        if(empty($cates)){
            $cates = DB::table('type')->get();
        }
        $new_cates = [];
        foreach ($cates as $k => $v) {
            if($v->parent_id == $id) {
                $v->sub = self::getCname($cates,$v->type_id);
                $new_cates[] = $v;
            }
        }
        return $new_cates;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('admin.cates.index',['data'=>self::getCates()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        return view('admin.cates.create',['id'=>$id,'cates'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $data = $request->except('_token');
           // dump($data);
             // 获取父级分类id
        $pid = $data['parent_id'];

        // 检测顶级分类
        if($pid == 0){
            $data['p_path'] = 0;
        }else{
            // 拼接path
            $parent_data = DB::table('type')->where('type_id','=',$pid)->first(); 
            $data['p_path'] = $parent_data->p_path.','.$parent_data->type_id;
        }   
        // 执行添加
        $res = DB::table('type')->insert($data);
        if($res){
             return redirect('admin/cates/index')->with('success', '添加成功');
         }else{
             return back()->with('error', '添加失败');
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
        
        $data = DB::table('type')->where('type_id',$id)->first();
        // 加载视图
        return view('admin.cates.edit',['data'=>$data,'cates'=>self::getCates()]);
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
        
         // 检测当前分类 下是否有 子分类
        $child_data = DB::table('type')->where('parent_id',$id)->first();
        if($child_data){
            return back()->with('error','当前分类下有子分类，不允许修改');
            exit;
        }

        // 
        // 接受数据
        $data = $request->except(['_token','_method']);
        // 获取父级分类id
        $pid = $data['parent_id'];
        // $data['status'] = 1;
        // 检测顶级分类
        if($pid == 0){
            $data['p_path'] = 0;
        }else{
            // 拼接path
            $parent_data = DB::table('type')->where('type_id','=',$pid)->first(); 
            $data['p_path'] = $parent_data->p_path.','.$parent_data->type_id;
        }   
        // 执行添加
        $res = DB::table('type')->where('type_id',$id)->update($data);
        if($res){
             return redirect('admin/cates/index')->with('success', '修改成功');
         }else{
             return back()->with('error', '修改失败');
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
         $child_data = DB::table('type')->where('parent_id',$id)->first();
        if($child_data){
            return back()->with('error','当前分类下有子分类，不允许删除');
            exit;
        }
        $res = DB::table('type')->where('type_id',$id)->delete();
        if($res){
            return redirect('admin/cates/index')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}
