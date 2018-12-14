<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettypes(){
        //获取列表数据
        //采用连贯方法结合原始表达式,放置SQL语句注入
        $type=DB::table("study_type")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
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
        //获取所有数据
        $data=DB::table("study")->get();
        //dd($data);
         $total=count($data);
        //dd($total);
        //连贯方法结合原始表达式 防止sql语句注入
        $type=DB::table("study")->where('title','like',"%".$request->input('keywords')."%")->orderBy('id')->paginate(3);
        //dd($data);
        //加载主页模板
        return view("Admin.Study.index",['type'=>$type,'total'=>$total,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有分类信息
        $data=$this->gettypes();
        //dd($data);
        //加载添加页面
         return view("Admin.Study.add",['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取要存入数据库的字段
        $data=$request->except(['_token','pic']);
        //判断是否具有文件上传
        if($request->hasFile('pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件的后缀名
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();
            //dd($ext);
            
            //移动到指定的目录下
            $request->file("pic")->move("./uploads",$name.".".$ext);

            //获取pic字段
            $pic=$name.".".$ext;

             $data['pic']=$pic;
        }
        //dd($data);
        //执行数据的插入
        if(DB::table("study")->insert($data)){
            return redirect("/study")->with('success','资料添加成功');
        }else{
            return back()->with('error','资料添加失败');
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
        //获取修改数据id
        //echo $id;
        //获取对应id的所有数据
        $data=DB::table("study")->where("id",'=',$id)->first();
        //dd($data);
        //获取数据中stypeid
        $sid=$data->stypeid;
        //dd($sid);
        //根据stypeid查找对应学习资料分类中的父类信息
        $info=DB::table("study_type")->where('id','=',$sid)->first();
        //dd($info);
         return view("Admin.Study.edit",['data'=>$data,'info'=>$info]);
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
        //获取id对应信息
        $file=DB::table('study')->where("id",'=',$id)->first();
        // dd($file);

        //获取要存入数据库的字段
        $data=$request->except(['_token','_method','pic']);
        //dd($data);
        //判断是否具有文件上传
        if($request->hasFile('pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件的后缀名
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();
            //dd($ext);
            
            //移动到指定的目录下
            $request->file("pic")->move("./uploads",$name.".".$ext);
            
            //获取pic字段
            $pic=$name.".".$ext;

             $data['pic']=$pic;
             unlink('./uploads/'.$file->pic);
        }else{
            $data['pic']=$file->pic;
        }
        //dd($data);
        //执行数据的插入
        if(DB::table("study")->where("id","=",$id)->update($data)){
            return redirect("/study")->with('success','资料修改成功');
        }else{
            return back()->with('error','资料修改失败');
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
        //获取删除的id值
        //echo $id;
        //获取id对应信息
        $data=DB::table('study')->where("id",'=',$id)->first();
        //dd($data);
        if(DB::table("study")->where("id",'=',$id)->delete()){
             unlink('./uploads/'.$file->pic);
            return redirect("/study")->with('success','资料删除成功');
         }else{
            return redirect("/study")->with('error','资料删除失败');
        }
    }
}
