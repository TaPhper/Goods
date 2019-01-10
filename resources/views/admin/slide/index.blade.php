@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>轮播图管理>>轮播图列表</h4>
    </div>
      <a href="/admin/slide/create" id="xg_btn" class="btn03">添加轮播图</a>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>轮播图</th>
                <th>轮播图地址</th>
                <th>轮播图状态</th>                        
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
              <tr>
                <td>
                <img src="/uploads/{{ $v->slide_img }}" alt="" style="width:100px;">
                </td>
                <td>{{ $v->slide_url }}</td>
                <td>
                  @if($v->slide_status == 1)
                  显示
                  @elseif($v->slide_status == 2)
                  隐藏
                  @endif
                </td>
                <td>
                  @if($v->slide_status == 1)
                  <a class="btn btn-info" href="/admin/slide/{{ $v->slide_id }}">隐藏</a>
                  @elseif($v->slide_status == 2)
                  <a class="btn btn-info" href="/admin/slide/{{ $v->slide_id }}">显示</a>
                  @endif
                  <a class="btn btn-warning" href="/admin/slide/{{ $v->slide_id }}/edit">修改</a>
                  <form action="/admin/slide/{{ $v->slide_id }}" method="post" style="display: inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" >删除</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <b><p class="cur_num">当前数据中{{$count}}条!</b>
          
          <!--分页 start-->
          <div class="pages ">
              {{ $data->links() }}                
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    </div>
</div>


@endsection