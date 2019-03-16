<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Reward;
use App\Admin\Extensions\ExcelExpoter;

class RewardController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('奖品管理');
            $content->description('');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        $r = isset($_GET['r'])?$_GET['r']:'';

        return Admin::content(function (Content $content) use ($id,$r) {

            $content->header('奖品管理');
            $content->description('奖品管理');

            $content->body($this->form()->edit($id));  
            
        });
    }


   
    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('添加奖品');
            $content->description('添加奖品');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Reward::class, function (Grid $grid) {


            $grid->id('ID')->sortable();
            $grid->name('奖品名称');
            $grid->pics('配图')->display(function(){
                return '<image src="/upload/'.$this->pics.'" style="width:40px;"/>';
            });
            $grid->type('类型')->display(function(){
                $arr = [1 => '第一名', 2 => '第二名', 3 => '第三名',4=>'第四名',5=>'第五名',6=>'第六名',7=>'第七名'];
                return $arr[$this->type];

            });
            
            $grid->actions(function ($actions) {
                $id = $actions->row->id;
                

            });
            $grid->filter(function($filter){
                $filter->like('name', '奖品名称');

            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Admin::form(Reward::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '奖品名称')->rules('required');
            $form->image('pics', '配图')->move('pics/')->removable();

            $form->radio('type', '类型')->options($arr = [1 => '第一名', 2 => '第二名', 3 => '第三名',4=>'第四名',5=>'第五名',6=>'第六名',7=>'第七名'])->default('1');;


            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

        });
    }
}
