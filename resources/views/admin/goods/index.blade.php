@extends("admin/layout/index")

@section('content')
  <div class="chuda_co" id="container" >
  <div class="co-box">
    <div class="title">
      <h4>商品管理>>商品列表</h4>
    </div>
    <div class="right container" style="width:83%;margin-left:260px;"> 
    	<form action="/admin/goods" method="get">
      <div class="custom-info">
          <div class="info-box">
            <ul>
              <li>
                <label>商品名称：</label>
                <input type="text" class="w100" name="gname">
              </li>
              <li>
                <label>所属分类：</label>
                <select class="w100" name="gcates">
                  <option>请选择</option>
                  @foreach ($cates as $k=>$v)
                       <option value="{{$v->type_id}}">{{ $v->type_name }}</option>
                  @endforeach
                </select>
              </li>
              <li>
                <label>商品状态：</label>
                <select class="w100" name="ground">
                  <option>请选择</option>
                  <option value="0">上架</option>
                  <option value="1">下架</option>
                </select>
              </li>
              
              <li><input type="submit"  value="查询" class="btn01"></li>
            </ul>
          </div>
      </div>
        </form>
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

                 <td><img src="/uploads/{{$v->goods_img }}" width="50"></td>
                  <td>{{ $v->market_price }}</td>
                <td>{{ $v->sales_grice }}</td>
                <td>{{ $v->is_ground == 0 ? '上架' : '下架'}}</td>
                <td>{{ $v->is_hot == 0 ? '否' : '是'}}</td>
                <td>
                     
                    <form action="/admin/goods/{{$v->goods_id}}" method="post" style="display:inline-block;">
                   {{csrf_field()}}
                   {{method_field('DELETE')}}
                   <button class="btn btn-danger">删除</button> 
               </form>
                      <a href="/admin/goods/{{$v->goods_id}}/edit" class="btn btn-info">修改</a>
                  
                </td>
              
              </tr>
             @endforeach
          </table>
      
          
          <!--分页 start-->
          <div class="pages ">
              {{ $goods->links() }}                
          </div>
          <!--分页 end-->
<!--分页 end-->
</div>
<!--detail end-->

</div>
</div>
@endsection