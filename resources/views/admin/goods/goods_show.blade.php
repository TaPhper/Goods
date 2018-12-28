@extends("admin/layout/index")

@section('content')
  <div class="chuda_co" id="container" >
  <div class="co-box">
    <div class="title">
      <h4>商品管理>>商品回收站</h4>
    </div>
    <div class="right container" style="width:83%;margin-left:260px;"> 
    	
      <div class="custom-info">
          <div class="info-box">
            <ul>
              <li>
                <label>商品名称：</label>
                <input type="text" class="w100" >
              </li>
              <li>
                <label>所属分类：</label>
                <select class="w100">
                  <option>请选择</option>
                </select>
              </li>
              <li>
                <label>商品状态：</label>
                <select class="w100">
                  <option>请选择</option>
                </select>
              </li>
              
              <li><a class="btn01">查询</a></li>
            </ul>
          </div>
      </div>
      <!--detail start-->
      <div class="co-detail clearfix" style=""> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>ID</th>
                <th>商品名称</th>
                <th>分类</th>
                 <th>品牌</th>
                  <th>商品图片</th>   
                <th>市场价</th>
                <th>销售价</th>          
                <th>是否上架</th>
                <th>是否热卖</th>
                <th>操作</th>
            
              </tr>
            </thead>
            <tbody>
              @foreach ($goods as $k=>$v)
              <tr>
                <td>{{ $v->goods_id}}</td>
              	<td>{{ $v->gname}}</td>
                <td>
                @foreach($cates as $kk=>$vv)
                {{ $v->type_id == $vv->type_id ? $vv->type_name : '' }}
                @endforeach
                </td>
                <td>{{$v->goodsbrands->brand_name}}
                </td>

                 <td>
                  <img src="/uploads/{{$v->goods_img }}" width="50" height="60">
                 </td>
                  <td>{{ $v->market_price }}</td>
                <td>{{ $v->sales_grice }}</td>
                <td>{{ $v->is_ground == 0 ? '上架' : '下架'}}</td>
                <td>{{ $v->is_hot == 0 ? '否' : '是'}}</td>
                <td>
                     
                <form action="/admin/goods/{{$v->goods_id}}" method="get" style="display:inline-block;">
                   <button class="btn btn-warning">恢复</button> 

                  <!--  <form action="/admin/goods/delete/{{$v->goods_id}}" method="get" style="display:inline-block;">
                   <button class="btn btn-danger">永久删除</button> -->
               </form>
               <form action="/admin/goods/delete/{{$v->goods_id}}" method="post" style="display: inline-block;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                  <input type="submit" name="" value="永久刪除" class="btn btn-danger">

               </form>
                    
                  
                </td>
              
              </tr>
             @endforeach
          </table>
            
          <!--分页 end-->
<!--分页 end-->
</div>
<!--detail end-->
</div>
</div>
</div>
@endsection