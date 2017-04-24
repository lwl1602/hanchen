<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Http\Model\Business;
use App\Http\Model\BusinessCategory;
use App\Http\Model\CompanyProfile;
use App\Http\Model\Contact;
use App\Http\Model\Laws;
use App\Http\Model\Link;
use App\Http\Model\News;
use App\Http\Model\Picture;
use App\Http\Model\SuccessfulCase;
use App\Http\Model\TeamProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EnterpriseController extends Controller{


    //进入到主页
    public function index(){
        $bcs = BusinessCategory::paginate(7);
        $picture = Picture::where('img_type',1)->first();
        $cp = CompanyProfile::first();
        $newses = News::where([])->orderBy('news_id','desc')->take(3)->get();   //take是获取的数量
        $links = Link::all();
        return view('enterprise.index',compact('picture','cp','newses','links','bcs'));
    }

    //进入新闻中心
    public function news(){
        $picture = Picture::where('img_type',1)->first();
        $newses = News::where([])->orderBy('news_id','desc')->paginate(6);
        $links = Link::all();
        $num = News::all()->count();
        return view('enterprise.news',compact('picture','newses','links','num'));
    }
    //显示单条新闻
    public function newsDetails($id,$i){
        $picture = Picture::where('img_type',1)->first();
        $news = News::find($id);
        $links = Link::all();
        $num = News::all()->count();
        return view('enterprise.news_details',compact('picture','news','links','num','i'));
    }

    //进入相关法规
    public function laws(){
        $picture = Picture::where('img_type',1)->first();
        $lawses = Laws::where([])->orderBy('laws_id','desc')->paginate(6);
        $links = Link::all();
        $num = Laws::all()->count();
        return view('enterprise.relevant',compact('picture','lawses','links','num'));
    }
    //显示单条法规
    public function lawsDetails($id,$i){
        $picture = Picture::where('img_type',1)->first();
        $laws = Laws::find($id);
        $links = Link::all();
        $num = Laws::all()->count();
        return view('enterprise.relevant_details',compact('picture','laws','links','num','i'));
    }

    //进入编辑界面
    public function show($id){
        $news = News::find($id);
        return view('admin.news.news-details',compact('news'));
    }

    //进入到成功页面
    public function successful(){
        $picture = Picture::where('img_type',1)->first();
        $scs = SuccessfulCase::with('BusinessCategory')->paginate(8);
        $links = Link::all();
        return view('enterprise.successful',compact('picture','scs','links'));
    }

    //进入到耽搁成功页面
    public function successfulDetails($id){
        $picture = Picture::where('img_type',1)->first();
        $sc = SuccessfulCase::find($id);
        $links = Link::all();
        return view('enterprise.successful_details',compact('picture','sc','links'));
    }

    //公司简介
    public function company(){
        $picture = Picture::where('img_type',1)->first();
        $company = CompanyProfile::first();
        $links = Link::all();
        return view('enterprise.company',compact('picture','company','links'));
    }

    //联系我们
    public function contact(){
        $picture = Picture::where('img_type',1)->first();
        $contact = Contact::first();
        $links = Link::all();
        return view('enterprise.contact',compact('picture','contact','links'));
    }

    //关于我们
    public function about(){
        $picture = Picture::where('img_type',1)->first();
        $teams = TeamProfile::paginate(10);
        $links = Link::all();
        return view('enterprise.about',compact('picture','teams','links'));
    }
    //个人
    public function aboutDetails($id){
        $picture = Picture::where('img_type',1)->first();
        $tp = TeamProfile::find($id);
        $links = Link::all();
        return view('enterprise.about_details',compact('picture','tp','links'));
    }

    //业务领域
    public function business(){
        $picture = Picture::where('img_type',1)->first();
        $buses = Business::with('BusinessCategory')->get();
        $bcs = BusinessCategory::all();
        $links = Link::all();
        return view('enterprise.business',compact('picture','buses','links','bcs'));
    }

    public function businessDetails($id){
        $picture = Picture::where('img_type',1)->first();
        $links = Link::all();
        $bus = Business::find($id);
        return view('enterprise.business_details',compact('picture','bus','links'));
    }
    


}