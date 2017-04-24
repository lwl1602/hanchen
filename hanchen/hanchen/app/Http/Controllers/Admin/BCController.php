<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\BusinessCategory;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BCController extends CommonController{

    public function index(){
        $bcs = BusinessCategory::all();
        $num = BusinessCategory::all()->count();
        return view('admin.businesscategory.bc-list',compact('bcs','num'));
    }

    //进入编辑界面
    public function show($id){
        $bc = BusinessCategory::find($id);
        return view('admin.businesscategory.bc-edit',compact('bc'));
    }
    
    //新闻数据库更新
    public function edit($id){
        if($input = Input::all()){
            $click = $_FILES["file-1"];
            $unclick = $_FILES["file-2"];
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "click"=>'required',
                "unclick"=>'required',
                "name"=>'required',
                "enname"=>'required',
            ];
            $message = [
                'click.required'=>'点击时图片不能为空',
                'unclick.required'=>'未点击时图片不能为空',
                'name.required'=>'分类名不能为空',
                'enname.required'=>'分类名英文不能为空',
            ];
                $validator = Validator::make($input,$rules,$message);
                if($validator->passes()){
                    $bc = BusinessCategory::find($id);
                    if($click['name']!=''&&$unclick['name']!='' ){

                        $click = $this->uploadImg('click_photos',$click['name'],$click['tmp_name'] );
                        $unclick = $this->uploadImg('click_photos',$unclick['name'],$unclick['tmp_name'] );
                        $bc->bc_click = $click;
                        $bc->bc_unclick = $unclick;
                    }
                    $bc->bc_name = $input['name'];
                    $bc->bc_enname = strtoupper($input['enname']);
                    $bc->bc_time = date('Y-m-d H:i:s');
                    $res = $bc->update();
                    if($res){
                        return back()->with('errors','更新成功');
                    }else{
                        return back()->with('errors','更新失败，请稍后重试');
                    }
                }else{
                    return back()->with('errors','更新失败，数据存在异常');
                }
        }else{
            return back()->with('errors','提交内容不能为空');
        }
    }

    //数据删除
    public function destroy($id){
        $bc = BusinessCategory::find($id);
        $res = BusinessCategory::where('bc_id',$id)->delete();
        if($res){
            if($bc->bc_click != ''||$bc->bc_click != null){
                unlink($bc->bc_click);
                unlink($bc->bc_unclick);
            }
            $data = [
                'status' => 0,
                'msg' => '删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //进入到新闻添加列表
    public function create(){
        $bcs = BusinessCategory::all();
        return view('admin.businesscategory.bc-add',compact('bcs'));
    }
    
    public function store(){
        if($input = Input::all()){
            $click = $_FILES["file-1"];
            $unclick = $_FILES["file-2"];
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "click"=>'required',
                "unclick"=>'required',
                "name"=>'required',
                "enname"=>'required',
            ];
            $message = [
                'click.required'=>'点击时图片不能为空',
                'unclick.required'=>'未点击时图片不能为空',
                'name.required'=>'分类名不能为空',
                'enname.required'=>'分类名英文不能为空',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $bc = new BusinessCategory;
                $click = $this->uploadImg('click_photos',$click['name'],$click['tmp_name'] );
                $unclick = $this->uploadImg('click_photos',$unclick['name'],$unclick['tmp_name'] );
                $bc->bc_click = $click;
                $bc->bc_unclick = $unclick;
                $bc->bc_name = $input['name'];
                $bc->bc_enname = strtoupper($input['enname']);
                $bc->bc_time = date('Y-m-d H:i:s');
                $res = $bc->save();
                if($res){
                    return back()->with('errors','更新成功');
                }else{
                    return back()->with('errors','更新失败，请稍后重试');
                }
            }else{
                return back()->with('errors','更新失败，数据存在异常');
            }
        }else{
            return back()->with('errors','提交内容不能为空');
        }
    }


}