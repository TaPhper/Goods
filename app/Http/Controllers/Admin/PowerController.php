<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Powers;
use App\Models\Admin\Admins;
use Illuminate\Support\Facades\Hash;
class PowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data = Powers::paginate(5);
        $count = Powers::count();
        return view('admin.powers.index',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.powers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 0 用户管理  1 订单管理  2 单据管理  3 商品管理  4 品牌管理 
        // 5 分类管理  6 员工管理  7 职位管理  8 发货管理  9 网站管理
        $this->validate($request, [
        'power_name' => 'required',
        'power_describe' => 'required',
        ],[
            'power_name.required' => '职位必填',
            'power_describe.required' => '职位描述必填',
        ]);
        $data = $request->except('_token');
        $arr = array(
            '0' => empty($data['power_usable0']) ? '' : '0,',
            '1' => empty($data['power_usable1']) ? '' : '1,',
            '2' => empty($data['power_usable2']) ? '' : '2,',
            '3' => empty($data['power_usable3']) ? '' : '3,',
            '4' => empty($data['power_usable4']) ? '' : '4,',
            '5' => empty($data['power_usable5']) ? '' : '5,',
            '6' => empty($data['power_usable6']) ? '' : '6,',
            '7' => empty($data['power_usable7']) ? '' : '7,',
            '8' => empty($data['power_usable8']) ? '' : '8,',
            '9' => empty($data['power_usable9']) ? '' : '9',
        );
        $data['power_usable'] = implode("", $arr);

        if($data['power_name'] == '经理'){
            $data['power_usable'] = $data['power_usable'];
        }else if($data['power_name'] == '客服'){
            $data['power_usable'] = $data['power_usable'];
        }else if($data['power_name'] == '订单'){
            $data['power_usable'] = $data['power_usable'];
        }else if($data['power_name'] == '商品'){
            $data['power_usable'] = $data['power_usable'];
        }else if($data['power_name'] == '自定义'){
            return back()->with('error','职位不能为自定义');

        }
        // 验证
        $power = Powers::where('power_name','=',$data['power_name'])->first();

        if(!$power){
            // 执行添加
            $power = new Powers;
            $power->power_name = $data['power_name'];
            $power->power_describe = $data['power_describe'];
            $power->power_usable = $data['power_usable'];
            $res = $power->save();

            if($res){
                return redirect('/admin/power')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','已拥有此权限');
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
        $admin = Admins::where('admin_post','=',$id)->first();
        if(!$admin){
            $data = Powers::find($id);
            // dump($user);
            $res = $data->delete();
            if($res){
                return redirect('admin/power')->with('success','删除成功');
            }else{
                return back()->with('error','删除失败');
            }
        }else{
            return back()->with('error','有用户使用此权限');
        }
        
    }
}
