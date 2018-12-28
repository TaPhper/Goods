@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>信息管理>>评价列表</h4>
    </div>
    <div class="right container">
      
      <!--detail start-->
      <div class="co-detail clearfix" style="margin-left: 190px"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>评论ID</th>
              	<th>用户名</th>
                <th>评论商品</th>
                <th>评论内容</th> 
                <th>评论时间</th>  
                <th>状态</th>     
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
           @foreach ($datas as $k=>$v)
              <tr>
              	<td>{{ $v->comment_id }}</td>
              	<td>{{ $v->usercomment['user_name'] }}</td>
              	<td>{{ $v->goodscomment['gname'] }}</td>
              	
              	<td>{{ $v->content }}</td>
              	<td>{{ $v->created_at }}</td>
              	<td>
              		@if($v->status == 0)
              		   未评价
              		@elseif($v->status == 1)
              		   已评价
              		@endif
              	</td>
              <td>
              	<form action="/admin/comment/{{$v->comment_id }}" method="post" style="display: inline-block;">
              		 	 {{ csrf_field() }}
                         {{ method_field('DELETE') }}
              	 	<input type="submit" value="删除" class="btn btn-danger">
              	</form>
              </td>
              
              </tr>
            @endforeach
            </tbody>
          </table>
          <b><p class="cur_num">当前数据{{ $count }}条</p></b>
                
          <!--分页 start-->
          <div class="pages">
            
                 {{ $datas->links()}}
          
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    </div>
  </div>
</div>


@endsection