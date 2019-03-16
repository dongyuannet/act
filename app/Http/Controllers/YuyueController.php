<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Yuyue;
use Illuminate\Http\Request;

class YuyueController extends Controller
{

	public function index(Request $request){
		// dd($request->all());
		$user = $request->input('Appuser');
		if(empty($user)) return ['code'=>1000,'信息不全'];
		$info = Yuyue::where(['phone'=>$user['mobile']])->first();
		if($info) return ['code'=>1000,'msg'=>'已经预约过了哦'];

		$needother = "";
		foreach ($user['needtype'] as $key => $v) {
			if($v==-1){
				$needother = $user['needother'];
				unset($user['needtype'][$key]);
				break;
			}

		}
		Yuyue::insertGetId([
			'name'=>$user['username'],
			'phone'=>$user['mobile'],
			'need'=>implode(",", $user['needtype']),
			'other'=>$needother,
			'date'=>date('Y-m-d H:i:s')
		]);
		return ['code'=>200,'msg'=>'预约成功'];
	}

}