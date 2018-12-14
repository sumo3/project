<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TMTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettypes(){
        //获取列表数据
        //采用连贯方法结合原始表达式,放置SQL语句注入
        $type=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历
        foreach($type as $key=>$value){
        // echo $value->path."<br>";
        //转换为数组
        $arr=explode(",",$value->path);
        // echo "<pre>";
        // var_dump($arr);
        //获取逗号个数
        $len=count($arr)-1;
        //字符串重复函数
        $type[$key]->name=str_repeat("--|",$len).$value->name;
        } 
        return $type;
    }

    public function index(Request $request)
    {
        //获取所有分类信息
        $data=$this->gettypes();
         //数一下总条数
        $total=count($data);
        //dd($total);
        //连贯方法结合原始表达式 防止sql语句注入
        $type=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like',"%".$request->input('keywords')."%")->orderBy('paths')->paginate(5);

        foreach($type as $key=>$value){
        // echo $value->path."<br>";
        //转换为数组
        $arr=explode(",",$value->path);
        // echo "<pre>";
        // var_dump($arr);
        //获取逗号个数
        $len=count($arr)-1;
        //字符串重复函数
        $type[$key]->name=str_repeat("--|",$len).$value->name;
        }
        // //获取分类信息
        // $type=DB::table("study_type")->get();
        //dd($type);

        //加载后台首页模板
        return view("Admin.TMType.index",['type'=>$type,'total'=>$total,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //获取所有分类信息
        $data=$this->gettypes();
       //dd($data);
        //加载添加页面
         return view("Admin.TMType.add",['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->all());
        //获取需要的添加的数据
        $data=$request->only(['name','pid','status']);
        //dd($data);
        //获取pid
        $pid=$request->input('pid');
        //dd($pid);
        //添加顶级分类信息
        if($pid==0){
            //拼接path
            $data['path']='0';
        }else{
            //添加子类信息
            //获取父类信息
            $info=DB::table("type")->where('id','=',$pid)->first();
            //拼接path
            $data['path']=$info->path.",".$info->id;
        }
        //dd($data);
        //执行数据的插入
        if(DB::table("type")->insert($data)){
            return redirect("/tmtype")->with('success','分类添加成功');
        }else{
            return back()->with('error','分类添加失败');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取传过来的id
        //echo $id;
        //获取id对应的数据
        $info=DB::table("type")->where("id",'=',$id)->first();
        //dd($info);
        //dd($info->pid);
        //获取pid,也就是父类的id
         $idd=$info->pid;
         //判断父类id是否为0.    0的话没父类,  其他有父类
        if($idd!=0){
            //有父类,根据$idd查找父类的信息
             $info1=DB::table("type")->where("id",'=',$idd)->first();
        }else{
            return back()->with('error','抱歉不能修改');
        }
       //dd($info1);
       
        //获取所有分类信息
        $data=$this->gettypes();
        //dd($data);
        
         return view("Admin.TMType.edit",['info'=>$info,'info1'=>$info1,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());

        //去除_token
        $data=$request->except(["_token","_method"]);

        //获取pid
        $pid=$request->input('pid');
        //dd($pid);
        //添加顶级分类信息
        if($pid==0){
            //拼接path
            $data['path']='0';
        }else{
            //添加子类信息
            //获取父类信息
            $info=DB::table("type")->where('id','=',$pid)->first();
            //拼接path
            $data['path']=$info->path.",".$info->id;
        }
        //dd($data);
        //将修改的数据写入
        if(DB::table("type")->where("id",'=',$id)->update($data)){
            return redirect("/tmtype")->with('success','修改成功');
        }else{
             return redirect("/tmtype/$id")->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取删除的id
        //echo $id;
        //获取删除分类的子类个数
        $res=DB::table("type")->where('pid','=',$id)->count();
        //echo $res;
        //判断
        if($res>0){
            return back()->with('error','请先删除子类');
        }

        //直接删除当前分类信息
        if(DB::table("type")->where('id','=',$id)->delete()){
            return redirect("/tmtype")->with("success",'删除成功');
        }else{
            return redirect("/tmtype")->with("error",'删除失败');
        }
    }
}
