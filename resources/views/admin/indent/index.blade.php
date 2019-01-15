@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container" style="width:100%;">
  <div class="co-box">
    <div class="title">
      <h4>订单管理>>订单列表</h4>
    </div>
      <!--detail start-->
    <div class="right container" style="width:83%;"> 

      <div class="custom-info" >
        <form action="">
          <div class="info-box">
            <ul>
              <li>
                <label>订单号：</label>
                <input type="text" name="indent_id" class="w100">
              </li>
              <li>
                <label>收货人：</label>
                <input type="text" name="consignee" class="w100">
              </li>
              <li>
                <label>订单状态：</label>
                <select class="w100" name="indent_state">
                  <option>请选择</option>
                  <option value="1">交易完成</option>
                  <option value="2">确认收货</option>
                  <option value="3">代付款</option>
                </select>
              </li>              
              <li><button class="btn01">查询</button></li>
            </ul>
          </div>
        </form>
      </div>
      <div class="co-detail clearfix" style="width:100%;"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>订单id</th>
                <th>订单号</th>            
                <th>下单时间</th>
                <th>收货人</th>                            
                <th>订单总金额</th>                            
                <th>订单状态</th>                            
                <th>商品id</th>                            
                <th>收货地址</th>                            
                <th>订购数量</th>                            
                <th>用户名</th>                            
                <th>支付方式</th>                            
                <th>操作</th>
              </tr>
            </thead>
            @foreach($data as $k=>$v)
            <tbody>

              <tr>
                <td>{{$v->indent_id}}</td>
                <td>{{$v->indent_number}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->consignee}}</td>
                <td>{{$v->indent_money}}</td>
                <td>
                  @if($v->indent_state == 1)
                  完成交易
                  @elseif($v->indent_state == 2)
                  确认收货
                  @elseif($v->indent_state == 3)
                  待付款
                  @endif
                </td>
                <td>{{$v->goods_id}}</td>
                <td>{{$v->address}}</td>
                <td>{{$v->indent_count}}</td>
                <td>{{$v->indentusers->user_name}}</td>
                <td>
                @if($v->payway == 1 )
                银联
                @elseif($v->payway == 2)
                微信
                @elseif($v->payway == 3)
                支付宝
                @endif
                </td>
                <td class="operation">
                <form action="/admin/indent/{{ $v->indent_id }}" method="post" style="display: inline-block;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-danger" >删除</button>
                </form>
                </td>
              </tr>
             
            </tbody>
            @endforeach
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
</div>

@endsection