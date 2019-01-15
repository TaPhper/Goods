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
                <th>支付方式</th>                            
              </tr>
            </thead>
            @foreach($data as $k=>$v)
            <tbody>
              @foreach($v as $kk=>$vv)
              <tr>
                <td>{{$vv->indent_id}}</td>
                <td>{{$vv->indent_number}}</td>
                <td>{{$vv->updated_at}}</td>
                <td>{{$vv->consignee}}</td>
                <td>{{$vv->indent_money}}</td>
                <td>
                  @if($vv->indent_state == 1)
                  完成交易
                  @elseif($vv->indent_state == 2)
                  确认收货
                  @elseif($vv->indent_state == 3)
                  待付款
                  @endif
                </td>
                <td>{{$vv->goods_id}}</td>
                <td>{{$vv->address}}</td>
                <td>{{$vv->indent_count}}</td>
                <td>
                @if($vv->payway == 1 )
                银联
                @elseif($vv->payway == 2)
                微信
                @elseif($vv->payway == 3)
                支付宝
                @endif
                </td>
              </tr>
              @endforeach
            </tbody>
            @endforeach
          </table>
         <b><p class="cur_num">当前数据中{{$count}}条!</b>
          
          <!--分页 start-->
          <div class="pages ">
              
          </div>
          <!--分页 end-->
      
      </div>
      <!--detail end--> 
    </div>
  </div>
</div>

@endsection