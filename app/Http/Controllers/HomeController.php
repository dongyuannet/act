<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Activity;
use App\Models\Reward;
use App\Models\Signup;
use App\Models\Zhulip;
use App\Models\Brand;
use App\Models\Scorep;
use App\Models\Danmu;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	public function index(Request $request){

		$aid = $request->input('aid')!=null?$request->input('aid'):1;
		$act = Activity::where(['id'=>$aid])->first();
		$reward = Reward::where([])->orderBy('type','asc')->get()->toArray();
		$jiang = [1 => '第一名', 2 => '第二名', 3 => '第三名',4=>'第四名',5=>'第五名',6=>'第六名',7=>'第七名'];
		$danmu = Danmu::where([])->get()->toArray();
		$signup = Signup::where([])->orderBy('sign_at','desc')->limit(10)->get()->toArray();
		$signup = $this->toFormat($signup);

		$zhulip = Zhulip::where([])->orderBy('zhu','desc')->limit(10)->get()->toArray();
		$zhulip = $this->toFormat($zhulip);
		$scorep = Scorep::where([])->orderBy('score','desc')->limit(10)->get()->toArray();
		$scorep = $this->toFormat($scorep);

		$brand = Brand::where([])->get()->toArray();
		// dd($signup);
		// $act->pics = json_decode($act->pics,1); 
		return view('home',['act'=>$act,'reward'=>$reward,'jiang'=>$jiang,'danmu'=>$danmu,'signup'=>$signup,'zhulip'=>$zhulip,'scorep'=>$scorep,'brand'=>$brand]);
		
	}

	public function moreBm(Request $request){
		 $res = Signup::where([])->paginate(10);
		 return $this->toFormat($res);
	}

	public function moreZhulip(Request $request){
		$res = Zhulip::where([])->paginate(10);
		return $this->toFormat($res);
	}

	public function moreScorep(Request $request){
		$res = Scorep::where([])->paginate(10);
		return $this->toFormat($res);
	}


	// 格式化
	private function toFormat($signup){
		foreach ($signup as $k => $v) {

			$signup[$k]['phones'] = substr_replace($v['phone'],'****',3,4);

			if(!isset($signup[$k]['sign_at'])) continue;
			$signup[$k]['shi'] = '';
			$time = strtotime($signup[$k]['sign_at']);
			$cha = time()-$time;
			if($cha<=60) $signup[$k]['shi'] = $cha.'秒前';
			if($cha<=3600 && $cha>60) $signup[$k]['shi'] = floor($cha/60).'分钟前';
			if($cha<=3600*24 && $cha>3600) $signup[$k]['shi'] = floor($cha/3600).'小时前';
			if($cha>60*24*60) $signup[$k]['shi'] = floor($cha/(3600*24)).'天前';

		}
		return $signup;
	}

}