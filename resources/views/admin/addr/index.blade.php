@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>发货地址管理>>发货地址列表</h4>
    </div>
   		
      <a href="/admin/addr/create" id="xg_btn" class="btn03">添加发货地址</a>
      <!--detail start-->

      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>发货点名称</th>
                <th>发往地址</th>
                <th>邮编</th>
                <th>联系电话</th>  
                <th>发货人</th>
                <th>是否设定默认地址</th>      
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
              <tr>
              	<td>{{$v->ship_addr}}</td>
                <td>{{$v->send_to}},{{$v->detailed}}</td>
                <td>{{$v->email}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->ship_name}}</td>
                <td>{{$v->default == 1 ? '是':'否'}}</td> 
                <td class="operation">
                	<a href="/admin/addr/{{$v->addr_id}}/edit" class="btn btn-info">修改</a>
                	<form action="/admin/addr/{{$v->addr_id}}" method="post" style="display:inline-block;">
                		{{method_field('DELETE')}}
                		{{csrf_field()}}
                		<input type="submit" name="" class="btn btn-danger" value="删除">
                		
                	</form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <p class="cur_num">当前数据中<b>{{$count}}</b>条!</p>
          <!--分页 start-->
          <div class="pages" style="margin-left:500px;">
            {{$data->links()}}
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    
  </div>
</div>

@endsection