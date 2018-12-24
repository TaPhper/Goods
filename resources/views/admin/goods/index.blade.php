@extends("admin/layout/index")

@section('content')
  <div class="chuda_co" id="container" >
  <div class="co-box">
    <div class="title">
      <h4>商品管理>>商品列表</h4>
    </div>
    <div class="right container" style="width:83%;margin-left:260px;"> 
    	
      <div class="custom-info">
          <div class="info-box">
            <ul>
              <li>
                <label>商品名称：</label>
                <input type="text" class="w100">
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
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>请选择</th>
                <th>商品名称</th>
                <th>分类</th>
                <th>库存</th>
                <th>状态</th>
                <th>销售价</th>
                <th>排序</th>                
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              	<td><input type="checkbox" name="" /></td>
                <td>001</td>
                <td>张三</td>
                <td>上课睡觉</td>
                <td>于强</td>
                <td>李朋</td>                
                <td>审核中</td>
                <td class="operation"><a class="edit">确认</a></td>
              </tr>
              <tr class="odd">
              	<td><input type="checkbox" name="" /></td>
                <td>001</td>
                <td>张三</td>
                <td>上课睡觉</td>
                <td>于强</td>
                <td>李朋</td>                
                <td>已审核</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
          <p class="cur_num">当前数据中1900条，每页显示<select class="w100">
                  <option>5</option>
                </select>条数据</p>
          <!--分页 start-->
          <div class="pages">
            <div class="pages-btn">
              <a class="pre">上一页</a>
              <div class="num-btn"><a class="pages-current">1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a></div>
              <a class="after">下一页</a>
</div>

</div>
<!--分页 end-->
</div>
<!--detail end-->
</div>
</div>
</div>
@endsection