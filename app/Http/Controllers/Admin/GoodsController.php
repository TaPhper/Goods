<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Http\Controllers\Admin\CatesController;
use  App\Models\Admin\Goods;
use  App\Models\Admin\Cates;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
              //多条件搜索查询
        
           $gname = empty($request->input('gname')) ? '' : $request->input('gname');
           $gcates = $request->input('gcates') =='请选择' ? '' : $request->input('gcates');
           $ground = $request->input('ground') =='请选择'? '' : $request->input('ground');

           if($request->input('gcates') =='请选择'){

                $data = Goods::where('gname','like','%'.$gname.'%')
                       ->where('is_ground','like','%'.$ground.'%')
                       ->paginate();
                $cates = DB::table('type')->where('parent_id','=','0')->get();

                return view('admin.goods.index',['goods'=>$data,'cates'=>$cates]);
           }else{
                $data = Goods::where('gname','like','%'.$gname.'%')
                             ->Where('type_id',$gcates)
                             ->Where('is_ground','like','%'.$ground.'%')
                             ->paginate(5);

                $cates = DB::table('type')->where('parent_id','=','0')->get();  
                return view('admin.goods.index',['goods'=>$data,'cates'=>$cates]);
           }
            $cates = DB::table('type')->where('parent_id','=','0')->get();
            return view('admin.goods.index',['goods'=>$data,'cates'=>$cates]);

           // $ground = $request->input('ground','');



          // $data = Goods::where('gname','like','%'.$gname.'%')->where('type_id','like','%'.$gcates.'%')->where('is_ground','like','%'.$ground.'%')->paginate();

         // $cates = DB::table('type')->get(); 
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $data=Brand::all();
        $goods =Cates::where('parent_id',0)->get();
        return view('admin.goods.create',['data'=>$data,'goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data=$request->except(['_token','profile']);
           // dd($data);
                if($request->hasFile('profile')){
            $profile = $request->file('profile');
            $res = $profile->store('images'); 
    }

                $goods = new Goods;
                $goods->gname = $data['gname'];
                $goods->type_id = $data['type_id'];
                $goods->brand_id = $data['brand_id'];
                $goods->market_price = $data['gprice'];
                $goods->sales_grice = $data['gprice_money'];
                $goods->is_ground = $data['gstatus'];
                $goods->is_hot = $data['ghot'];
                $goods->is_new = $data['gspecial'];
                $goods->goods_img = $res;
                $res = $goods->save();
        if($res){
            return redirect('/admin/goods')->with('success','添加成功');
         }else{
            return back()->with('error','添加失败');
         }


    }

    /**
     * 回收站数据恢复
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Goods::withTrashed()
        ->where('goods_id',$id)
        ->restore();

         if($res){
            return back()->with('success','恢复成功');
         }else{
            return back()->with('error','恢复失败');
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
           $data=Brand::all();
          $datas=Goods::find($id);
          $goods =Cates::where('parent_id',0)->get();
        return view('admin.goods.edit',['data'=>$data,'datas'=>$datas,'goods'=>$goods]);
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
         $data=$request->except(['_method','_token']);

            $goods = Goods::find($id);
            $goods->gname = $data['gname'];
            $goods->type_id = $data['type_id'];
            $goods->brand_id = $data['brand_id'];
            $goods->market_price = $data['gprice'];
            $goods->sales_grice = $data['gprice_money'];
            $goods->is_ground = $data['gstatus'];
            $goods->is_hot = $data['ghot'];
            $goods->is_new = $data['gspecial'];

            if($request->hasFile('profile')){
                $profile = $request->file('profile');
                $path = $profile->store('images'); 
                $goods->goods_img = $path;
            }
            
            $res = $goods->save();

         if($res){
            return redirect('/admin/goods')->with('success','修改成功');
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
        $res=Goods::destroy($id);

          if($res){
            return redirect('/admin/goods')->with('success','删除成功');
         }else{
            return back()->with('error','删除失败');
         }


    }
     /**
      * 回收站
      *
      */
    public function goods_show()
    {


         $cates = DB::table('type')->get(); 
        $goods=Goods::onlyTrashed()->get();
        return view ('admin.goods.goods_show',['goods'=>$goods,'cates'=>$cates]);
    }
     /**
      *  回收站永久删除
      */
    public function delete($id)
    {
    
       $data = Goods::onlyTrashed()->find($id);
       
       $res=$data->forceDelete();
       if($res){
        return back()->with('success','刪除成功');
       }else{
        return back()->with('error','刪除失敗');
       }

    }

}
