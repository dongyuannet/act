<?php 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use App\Models\Zhuli;
use App\Models\User;
use App\Models\Zhuan;
use App\Models\Signup;
use DB;
class ZhulipCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pm:zhulip';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '助力排名';
 
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
 
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::statement('truncate zhulip');
        $res = Zhuli::where([])->select(DB::raw('count(uid),uid,aid'))->groupBy(DB::raw('uid,aid'))->orderBy('count(uid)','desc')->get()->toArray();
        
        foreach ($res as $key => $v) {
            $insert = [];
            $sign = Signup::where(['uid'=>$v['uid'],'aid'=>$v['aid']])->first();
            if(empty($sign)) continue;
            $insert[] = $v['uid'];
            $insert[] = $v['aid'];
            $zcount = Zhuan::where(['uid'=>$v['uid']])->orWhere(['zhuanid'=>$v['uid']])->count();
            $insert[] = $zcount;
            $insert[] = $v['count(uid)'];
            $insert[] = $sign->name;
            $insert[] = $sign->phone;
            $insert[] = date('Y-m-d H:i:s');
            DB::insert('insert into zhulip (uid,aid,zhuan,zhu,name,phone,at) values (?,?,?,?,?,?,?)', $insert);
        }
        
    }
}