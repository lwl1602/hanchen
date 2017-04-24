<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/19
 * Time: 10:48
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ContactController extends CommonController{
    
    public function index(){
        $contact = Contact::first();
        return view('admin.contact.contact-edit',compact('contact'));
    }
    
    public function edit(){
        if($input = Input::all()) {
            $contact = Contact::first();
            $picture = $_FILES["file-2"];
            $rules = [                      //数据验证规则
                "uploadfile" => 'required',
                "name" => 'required',
                "site" => 'required',
                "postcode" => 'required',
                "phone" => 'required',
                "faxes" => 'required',
                "email" => 'required',
                "url" => 'required',
            ];
            $message = [
                'uploadfile.required' => '图片不能为空',
                'name.required' => '公司名不能为空',
                'site.required' => '地址不能为空',
                'postcode.required' => '邮编不能为空',
                'phone.required' => '电话不能为空',
                'faxes.required' => '传真不能为空',
                'email.required' => '邮箱不能为空',
                'url.required' => '网址不能为空',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {       //查看数据验证是否通过
                if($picture['name']!=null||$picture['name'] !=""){
                    $oldurl = $contact->contact_imgurl;
                    if(file_exists($oldurl)){
                        unlink($oldurl);
                    }
                    $newurl = $this->uploadImg('contace_photos',$picture['name'],$picture['tmp_name']);
                    $contact->contact_imgurl = $newurl;
                }
                $contact->contact_name = $input['name'];
                $contact->contact_site= $input['site'];
                $contact->contact_postcode = $input['postcode'];
                $contact->contact_phone = $input['phone'];
                $contact->contact_faxes = $input['faxes'];
                $contact->contact_email = $input['email'];
                $contact->contact_url = $input['url'];
                $result = $contact->save();
                if ($result) {                            // 如果$result存在值的话
                    return back()->with('errors', '修改成功！')->withInput();
                } else {
                    return back()->with('errors', '请认真检查数据是否有问题，修改失败！')->withInput();
                }
            } else {
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }
    }
    
}