<?php
/**
 * Created by PhpStorm.
 * User: lushaohui
 * Date: 2017/6/28
 * Time: 16:19
 */

namespace lushaohui\view;


class Base
{
    //定义一个全局属性$file;2.目的是在本类中方便被调用
    private $file;
    //定义一个全局属性$var;2.目的是在本类中方便被调用
    private $var=[];

    /**
     * make方法用来加载模板
     */
    public function make(){
        //1.组合完整路径；2.因为在应用中具体调用哪个模板不确定，所以不能写死
        $this->file = "../app/" .MODULE."/view/".CONTROLLER."/".ACTION.".php";
        //将对象返回；2.目的是为了链式调用
        return $this;
    }
    public function with($data){
        //将$data属性赋值给var
        $this->var = $data;
        //将对象返回;2.目的是为了链式调用
        return $this;
    }
    public function __toString()
    {
        //1.将键名变为变量名，键值变为变量值;2.因为$data是一个数组形式，需要通过extract函数将其分割
        extract($this->var);
        //载入$file模板文件；2.目的是为了让其在页面显示
        include $this->file;
        //将空的字符串返回;2.目的是为了链式调用的时候不报错
        return '';
    }
}