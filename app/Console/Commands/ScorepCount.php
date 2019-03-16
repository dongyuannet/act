<?php 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use App\Models\Scoreuser;
use App\Models\User;
use App\Models\Zhuan;
use App\Models\Signup;
use DB;
class ScorepCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pm:scorep';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '积分排名';
 
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
        DB::statement('truncate scorep');
        $res = Scoreuser::where([])->select(DB::raw('sum(fen),uid,aid'))->groupBy(DB::raw('uid,aid'))->orderBy('sum(fen)','desc')->get()->toArray();
        
        foreach ($res as $key => $v) {
            $insert = [];
            $sign = Signup::where(['uid'=>$v['uid'],'aid'=>$v['aid']])->first();
            if(empty($sign)) continue;
            $insert[] = $v['uid'];
            $insert[] = $v['aid'];
            $zcount = Zhuan::where(['uid'=>$v['uid']])->orWhere(['zhuanid'=>$v['uid']])->count();
            $insert[] = $zcount;
            $insert[] = $v['sum(fen)'];
            $insert[] = $sign->name;
            $insert[] = $sign->phone;
            $insert[] = date('Y-m-d H:i:s');
            DB::insert('insert into scorep (uid,aid,zhuan,score,name,phone,at) values (?,?,?,?,?,?,?)', $insert);
        }
        
    }
}