<?php //($data); ?>
@extends("Admin.AdminPublic.public")
@section("admin")
<link rel="stylesheet" href="/static/admin/css/amazeui.min.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <link rel="stylesheet" href="/static/admin/css/app.css">
 <style>
      .admin-main{
        padding-top: 0px;
      }
    </style>
<div class="am-cf admin-main">
    <!-- content start -->
    <div class="admin-content">
      <div class="admin-content-body">
        <div class="am-g">
          <form class="am-form am-form-horizontal"
             method="post" action="/study/{{$data->id}}" enctype="multipart/form-data"
            style="padding-top:30px;" data-am-validator>
            
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">
             标题</label>
              <div class="am-u-sm-9">
                <input type="text" id="doc-vld-pwd-1" required 
                  name="title" value="{{$data->title}}">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">分类</label>
              <div class="am-u-sm-9">
              <!-- <?php ($data) ?> -->

                  <select class="large" name="stypeid">
                    <option value="{{$info->id}}">{{$info->name}}</option>
                    

                  </select>
                 
                  </div>
             </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">描述</label>
              <div class="am-u-sm-9">
                <input type="text" id="doc-vld-pwd-2" required  
                  name="description"  data-equal-to="#doc-vld-pwd-1"  required value="{{$data->description}}">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">文件</label>
              <div class="am-u-sm-9">
                <input type="file" id="doc-vld-pwd-2" placeholder="" 
                  name="pic"  data-equal-to="#doc-vld-pwd-1"  value="{{$data->pic}}">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">是否显示</label>
              <div class="am-u-sm-9">
                <input type="text" id="doc-vld-pwd-2" required 
                  name="status"  data-equal-to="#doc-vld-pwd-1"  required value="{{$data->status}}">
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
              {{csrf_field()}}
            {{method_field("PUT")}}
                <input type="submit" class="am-btn am-btn-success" value="提交修改" />
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"
    src="assets/js/libs/jquery-1.10.2.min.js">
  </script>
  <script type="text/javascript" src="myplugs/js/plugs.js">
  </script>
@endsection
@section('title','资料修改')