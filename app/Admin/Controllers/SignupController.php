<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Signup;
use App\Models\Brand;
use App\Models\User;
use App\Models\Activity;
use App\Admin\Extensions\ExcelExpoter;

class SignupController extends Controller
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

            $content->header('报名管理');
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
        return Admin::content(function (Content $content) use ($id) {

            $content->header('报名管理');
            $content->description('报名管理');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Signup::class, function (Grid $grid) {

            $grid->model()->orderBy('id','desc');
            $grid->id('ID')->sortable();
            $grid->name('姓名');
            $grid->phone('手机号');
            $grid->bid('品牌')->display(function(){
                $brand = Brand::where(['id'=>$this->bid])->first();
                return $brand->name;
            });
            $grid->column('uid','用户')->display(function(){
                $user = User::where(['id'=>$this->uid])->first();
                return "<a href='/admin/user?id={$user->id}'>".$user->name."</a>";
            });
            $grid->column('aid','活动')->display(function(){
                $act = Activity::where(['id'=>$this->aid])->first();
                return "<a href='/admin/active?id={$act->id}'>".$act->title."</a>";
            });
            $grid->sign_at('报名时间');
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                // $actions->disableEdit();
                
            });
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                
            });
            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });
            $grid->disableCreateButton();
            $grid->filter(function($filter){
                $filter->like('name', '姓名');
                $filter->like('phone', '手机号');
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
        return Admin::form(Signup::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('name', '姓名');
            $form->display('phone', '手机号');
            
            $form->display('bid', '品牌')->with(function(){
                $brand = Brand::where(['id'=>$this->bid])->first();
                return $brand->name;
            });

            $form->display('uid', '用户')->with(function(){
                $user = User::where(['id'=>$this->uid])->first();
                return "<a href='/admin/user?id={$user->id}'>".$user->name."</a>";
            });

            $form->display('aid', '活动')->with(function(){
                $act = Activity::where(['id'=>$this->aid])->first();
                return "<a href='/admin/active?id={$act->id}'>".$act->title."</a>";
            });
            $form->display('sign_at', '报名时间');

            
            $form->disableSubmit();
            $form->disableReset();

        });
    }
}
