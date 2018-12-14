@extends("Admin.AdminPublic.public")
@section("admin")
<link rel="stylesheet" href="/static/admin/css/amazeui.min.css" />
		  <link rel="stylesheet" href="/static/admin/css/admin.css" />
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf">
          <strong class="am-text-primary am-text-lg">休闲一刻</strong> 
        </div>
      </div>

      <hr>
      <center><h1>来啦,老弟</h1></center>
      <center><h1>看会图片休息一下吧</h1></center>
      <ul class="am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-margin gallery-list">
        <li>
          <a href="">
            <img class="am-img-thumbnail am-img-bdrs" src="/static/admin/images/1.jpg" alt="">
            <div class="gallery-title">梦想是注定孤独的旅程</div>
          </a>
        </li>
        <li>
          <a href="">
            <img class="am-img-thumbnail am-img-bdrs" src="/static/admin/images/2.jpg" alt="">
            <div class="gallery-title">梦想是注定孤独的旅程</div>
          </a>
        </li>
        <li>
          <a href="">
            <img class="am-img-thumbnail am-img-bdrs" src="/static/admin/images/3.jpg" alt="">
            <div class="gallery-title">梦想是注定孤独的旅程</div>
          </a>
        </li>
        <li>
          <a href="">
            <img class="am-img-thumbnail am-img-bdrs" src="/static/admin/images/4.jpg" alt="">
            <div class="gallery-title">梦想是注定孤独的旅程</div>
          </a>
        </li>
        <li>
          <a href="">
            <img class="am-img-thumbnail am-img-bdrs" src="/static/admin/images/5.jpg" alt="">
            <div class="gallery-title"> 梦想是注定孤独的旅程</div>
          </a>
        </li>
        <li>
         
      </ul>

    
    </div>
@endsection
@section('title','后台首页')