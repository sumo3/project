<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LiuyanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //关联表查询  关联liuyan表和user表,  liuyan中的uid和user中的id对应   并根据需要改字段名字
        $data=DB::table("liuyan")->join('user','liuyan.uid','=','user.id')->select(DB::raw('liuyan.id as id,liuyan.uid as uid,liuyan.content,liuyan.time,user.name as name'))->get();
        //dd($data);
        $total=count($data);
        //dd($total);
        $data=DB::table("liuyan")->join('user','liuyan.uid','=','user.id')->select(DB::raw('liuyan.id as id,liuyan.uid as uid,liuyan.content,liuyan.time,user.name as name'))->where('name','like',"%".$request->input('keywords')."%")->orderBy('id')->paginate(5);
       return view("Admin.Liuyan.index",['data'=>$data,'total'=>$total,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //
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
        //根据id去留言表中删除对应数据
        $data=DB::table("liuyan")->where("id",'=',$id)->first();
        //dd($data);
        if(DB::table('liuyan')->where('id','=',$id)->delete()){
            return redirect('/liuyan')->with('success','删除成功');
        }else{
            return redirect('/liuyan')->with('error','删除失败');
        }
    }
}
