@include("Admin.Vie.header")
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>模板</title>
</head>
<body>
	<h1>解析变量:{{$a}}</h1>
	<h1>使用函数:{{time()}}</h1>
	<h1>分配默认值:{{$b or 'naiwen'}}</h1>
	<h1>转换为html页面:{!!$c!!}</h1>
	<h1>数据遍历:</h1>
	
	<table border="1px" width="400px">
		<tr>
			<th>name</th>
			<th>age</th>
		</tr>
		@foreach($arr as $row)
		<tr>
			<td>{{$row['name']}}</td>
			<td>{{$row['age']}}</td>
		</tr>
		@endforeach
	</table>
	<h1>for循环</h1>
	@for($i=0;$i<10;$i++)
	{{$i}}
	@endfor
	<h1>if语句</h1>
	@if($d==10)
	科比
	@elseif($d>10)
	奥尼尔
	@else
	库里
	@endif
</body>
</html>