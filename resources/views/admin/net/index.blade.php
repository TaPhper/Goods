@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container" style="width:100%;">
  <div class="co-box">
    <div class="title">
      <h4>网站管理>>网站列表</h4>
    </div>
   
      <a href="/admin/net/create" id="xg_btn" class="btn03">设置网站</a>
      <!--detail start-->
      <div class="co-detail clearfix" style="width:100%;"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>网站ID</th>
              	<th>网站名称</th>
                <th>网站标题</th>            
                <th>网站联系电话</th>
                <th>网站Logo</th>                            
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            	
            @foreach($data as $k=>$v)
              <tr>
                <td>{{$v->net_id}}</td>
                <td>{{$v->net_name}}</td>
                <td>{{$v->net_key}}</td>
                <td>{{$v->net_phone}}</td>
                <td>
                	<img src="/uploads/{{$v->net_logo}}" width="50px;">
                </td> 
                <td class="operation">
                	<a href='/admin/net/{{$v->net_id}}/edit' class="btn btn-warning">修改</a>
                	<form action="/admin/net/{{$v->net_id}}" method="post" style="display: inline-block">
                		{{csrf_field()}}
                		{{method_field('DELETE')}}
                		<input type="submit" name="" value="删除" class="btn btn-danger">
                	</form>
                </td>
              </tr>
            @endforeach
             
            </tbody>
            
          </table>
         
  
          
               

          <!--分页 start--> 
          <div class="pages" >
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
  </div>
</div>
@endsection
