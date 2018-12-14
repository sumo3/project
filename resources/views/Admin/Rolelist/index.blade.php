@extends("Admin.AdminPublic.public")
@section('admin')
<link rel="stylesheet" href="/static/admin/css/amazeui.min.css" />
<link rel="stylesheet" href="/static/admin/css/admin.css" />
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style type="text/css" media="screen">
  #tishi{
    width: 1000px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    color: red;
    /* background: red; */
    margin-left: 50px;
  }
</style>
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">角色列表</strong><small></small></div>
      </div>

      <hr>

      <div class="am-g">

        <div class="am-u-sm-12 am-u-md-3">

        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <span class="am-input-group-btn">
          </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form" action="" method="post">
            <table class="am-table am-table-striped am-table-hover table-main">
               <p id="tishi" onclick="tishi()">{{session('success')}}</p>
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox"></th>
                  <th class="table-id">ID</th>
                  <th class="table-title">角色名</th>
                  <th class="table-set">操作</th>
                </tr>
              </thead>
              <tbody>
         
                @foreach($role as $row)
                <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$row->id}}</td>
                  <td>
                    <a href="">{{$row->name}}</a>
                  </td>
                  <td>
                    <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
                      <a class="btn btn-info" href="/auth/{{$row->id}}">分配权限</a><br>
                                      
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
               
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
     <script type="text/javascript">
        function tishi(){
            //获取提示框
            var tishi = document.getElementById('tishi');
            //alert(tishi);
                tishi.style.display="none";
          }
     </script>
@endsection
@section('title','管理员列表')