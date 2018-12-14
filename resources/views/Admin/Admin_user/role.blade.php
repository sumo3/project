@extends("Admin.AdminPublic.public")
@section('admin')
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/amazeui.min.css" />
    <link rel="stylesheet" href="/static/admin/css/admin.css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>

  <body>
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">角色信息</strong><small></small></div>
      </div>

      <hr>

      <div class="am-g">

        <div class="am-u-sm-12 am-u-md-3">

        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">

          <form class="am-form" action="/saverole" method="post">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th class="table-check"></th>
                  <th class="table-id"></th>
                  <th class="table-title">角色信息</th>
                  <th class="table-set">当前分配用户:{{$user->name}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($role as $row)
                <tr>
                   
                    <td><input type="checkbox" name="rid[]" value="{{$row->id}}" @if(in_array($row->id,$rids)) checked @endif></td>
                    <td></td>
                    <td>
                      <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                        <p>{{$row->name}}</p>
                        </div>
                      </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <input type="hidden" name="uid" value="{{$user->id}}">
            {{csrf_field()}}
            <button type="submit" class='btn btn-success'>分配角色</button>
          </form>
        </div>

      </div>
    </div>
    
  
  </body>

</html>
@endsection
@section('title','角色信息')