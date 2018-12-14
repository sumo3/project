@extends("Admin.AdminPublic.public")
@section("admin")
<html>
 <head></head>
<link rel="stylesheet" href="/static/admin/css/amazeui.min.css" />
<link rel="stylesheet" href="/static/admin/css/admin.css" />
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style type="text/css" media="screen">
  #tishi{
    width: 500px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    color: blue;
    /* background: yellow; */
     position: absolute;
    top: 90px;
    left: 150px;
  }
  #tishi1{
    width: 500px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    color: red;
    /* background: red; */
    position: absolute;
    top: 90px;
    left: 650px;
  }
</style>
 <body>
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">分类列表</strong><small></small></div>
      </div>

      <hr>
      

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="/type/create"> 新增</a></button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
        </div>
        <div class="am-u-sm-12 am-u-md-3">



      <form action="/type" method="get">
         <div class="am-input-group am-input-group-sm">
           <input type="text" class="am-form-field" name="keywords" value="{{$request['keywords'] or ''}}" placeholder="请输入关键字">
           <span class="am-input-group-btn">
           <input class="am-btn am-btn-default" type="submit" value="搜索">
         </span>
         </div>
         </form>

         <!--  <form action="/type" method="get">
              <div class="am-input-group am-input-group-sm">
             <input type="text" name="keywords" value="{{$request['keywords'] or ''}}"/><input type="submit" value="搜索">
              </div>
          </form> -->

        </div>
      </div>
      <p id="tishi" onclick="tishi()">{{session('success')}}</p>
      <p id="tishi1" onclick="tishi1()">{{session('error')}}</p>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox"></th>
                  <th class="table-id">ID</th>
                  <th class="table-title">类名</th>
                  <th class="table-type">pid</th>
                  <th class="table-author am-hide-sm-only">path</th>
                  <th class="table-author am-hide-sm-only">显示与否</th>
                  <th class="table-set">操作</th>
                </tr>
              </thead>
              <tbody>
               @foreach($type as $value)
                <tr>
                  <td><input type="checkbox"></td>
                 
                  <td>{{$value->id}}</td>
                  <td>
                    <a href="#">{{$value->name}}</a>
                  </td>
                  <td>{{$value->pid}}</td>
                  <td class="am-hide-sm-only">{{$value->path}}</td>
                  <td class="am-hide-sm-only">{{$value->status}}</td>
                 
                  <td>
                    <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
                        <a href="/type/{{$value->id}}/edit" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a><br>

                        <form action="/type/{{$value->id}}" method="post">
                        {{method_field("DELETE")}}
                        {{csrf_field()}}
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                 @endforeach
              
              </tbody>
            </table>
            <div class="am-cf">
              共 {{$total}} 条记录
              <div class="am-fr">
                {{$type->appends($request)->render()}}
              </div>
            </div>

            <hr>
          </form>
        </div>
      </div>
    </div>
     </body>
     <script type="text/javascript">
        function tishi(){
            //获取提示框
            var tishi = document.getElementById('tishi');
            //alert(tishi);
                tishi.style.display="none";
          }
          function tishi1(){
            //获取提示框
            var tishi1 = document.getElementById('tishi1');
            //alert(tishi);
                tishi1.style.display="none";
          }
     </script>
</html>
@endsection
@section('title','分类列表')