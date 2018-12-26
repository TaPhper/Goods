<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Http\Controllers\Admin\CatesController;
use  App\Models\Admin\Goods;
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
          // dump($request->all());
           $gname = $request->input('gname','');
           // $ground = $request->input('ground','');



        $data = Goods::where('gname','like','%'.$gname.'%')->paginate(3);

         // $cates = DB::table('type')->get(); 
          $cates = DB::table('type')->where('parent_id','=','0')->get();



           
        return view('admin.goods.index',['goods'=>$data,'cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $data=Brand::all();

            return view('admin.goods.create',['data'=>$data,'goods'=>CatesController::getCates()]);
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
     * Display the specified resource.
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
            return redirect('/admin/goods')->with('success','恢复成功');
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
        return view('admin.goods.edit',['data'=>$data,'datas'=>$datas,'goods'=>CatesController::getCates()]);
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
            if($request->hasFile('profile')){
            $profile = $request->file('profile');
            $res = $profile->store('images'); 
           }

          $goods = Goods::find($id);
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

    public function goods_show()
    {


         $cates = DB::table('type')->get(); 
        $goods=Goods::onlyTrashed()->get();
        return view ('admin.goods.goods_show',['goods'=>$goods,'cates'=>$cates]);
    }

    public function delete($id)
    {
         // dump($id);
        $res= Goods::destroy($id);
        // dump($res);die;
        // dump($res->forceDelete());
    }

}
