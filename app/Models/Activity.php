<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
class Activity extends Model{  
    //设置表名  
  
    protected $table = "activity";  
    // public $timestamps = false;  
   	public function setPicsAttribute($image)
	{
	    if (is_array($image)) {
	        $this->attributes['pics'] = json_encode($image);
	    }
	}

	public function getPicsAttribute($image)
	{
		//$image = explode(',',$image)?explode(',',$image):'';
	    return json_decode($image);
	}
}  