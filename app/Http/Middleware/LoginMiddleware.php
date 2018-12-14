<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //中间件过滤数据的核心 操作方法  $request请求报文  Closure $next下一个请求
    public function handle($request, Closure $next)
    {
        //检测当前有没有登录的session信息
        if($request->session()->has('name')){
            //获取访问模块控制器和方法名
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            //控制器名字
            $controllerName=$func[0];
            //方法
            $actionName=$func[1];

            // echo $controllerName;
            // echo $actionName;

            //4.获取访问模块控制器和方法 和 用户权限列表做对比
            //获取登陆用户所有权限列表
            $nodelist=session('nodelist');
            if (empty($nodelist[$controllerName]) ||!in_array($actionName,$nodelist[$controllerName])) {
                return redirect('/admin')->with('error','抱歉,你没有权限访问该模块');
            }

            //执行下个请求
            return $next($request);
        }else{
            //跳转到登录界面
            return redirect("/login/create");
            
        }
        
    }
}
