@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container" style="width:100%;">
  <div class="co-box">
    <div class="title">
      <h4>品牌管理>>品牌列表</h4>
    </div>
   
      <a href="/admin/brand/create" id="xg_btn" class="btn03">添加品牌</a>
      <!--detail start-->
      <div class="co-detail clearfix" style="width:100%;"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>品牌Logo</th>
                <th>品牌名称</th>            
                <th>品牌描述</th>
                <th>是否显示</th>                            
                <th>操作</th>
              </tr>
            </thead>
            @foreach($brand as $k=>$v)
            <tbody>

              <tr>
                <td><img src="/uploads/{{$v->brand_logo}}" width="50"></td>
                <td>{{$v->brand_name}}</td>
                <td>{{$v->brand_describlle}}</td>
                <td>
                	{{$v->brand_is_show == 0 ? '是' : '否'}}

                </td> 
                <td class="operation">
                <a href="/admin/brand/{{$v->brand_id}}/edit" class="btn btn-info">修改</a>
               <form action="/admin/brand/{{$v->brand_id}}" method="post" style="display:inline-block;">
                 {{csrf_field()}}
                 {{method_field('DELETE')}}
                 <button class="btn btn-danger">删除</button> 
               </form>
                 
                 
                </td>
              </tr>
             
            </tbody>
            @endforeach
          </table>
          <b><p class="cur_num">当前数据有{{$res}}条!</p></b>
          <!--分页 start--> 
          <div class="pages" >
            {{$brand->links()}}
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    
  </div>
</div>



@endsection