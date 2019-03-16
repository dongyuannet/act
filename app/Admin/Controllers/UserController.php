<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\User;
use App\Admin\Extensions\ExcelExpoter;

class UserController extends Controller
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

            $content->header('用户管理');
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

            $content->header('用户管理');
            $content->description('用户管理');

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

            $content->header('添加用户');
            $content->description('添加用户');

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
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->model()->orderBy('id','desc');
            $grid->id('ID')->sortable();
            $grid->name('微信名称');
            $grid->avatar('头像')->display(function(){
                return '<image src="'.$this->avatar.'" style="width:40px;"/>';
            });
            $grid->phone('手机');
            $grid->openid('openid');
            $grid->reg_time('注册时间');
            $grid->zhuan_num('转发数');
            $grid->zhu_num('助力数');
            $grid->score('积分');
            $grid->reg_time('注册时间');
            
            $grid->actions(function ($actions) {
                $id = $actions->row->id;
                

            });
            $grid->disableCreateButton();
            
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                
            });
            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });
            $grid->filter(function($filter){
                $filter->like('name', '微信名称');
                $filter->like('phone', '手机');

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

        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('name', '微信名称');
            $form->display('avatar', '头像')->with(function(){
                return '<image src="'.$this->avatar.'" style="width:40px;"/>';
            });
            $form->display('phone', '手机');
            $form->display('openid', 'openid');
            $form->display('zhuan_num', '转发数');
            $form->display('zhu_num', '助力数');
            $form->display('score', '积分');
            $form->display('reg_time', '注册时间');
            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

        });
    }
}
