<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
class User extends Model{  
    //设置表名  
  
    protected $table = "users";  
    public $timestamps = false;  
   	
}  