<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
class JuanBmExtend extends Model{  
    //设置表名  
  
    protected $table = "ims_zh_gjhdbm_bmextend";  
    public $timestamps = false;  
    protected $connection = 'juan';
   
}  