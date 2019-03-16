<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Scoreuser;
use App\Models\Brand;
use App\Models\User;
use App\Models\Activity;
use App\Admin\Extensions\ExcelExpoter;

class ScoreuserController extends Controller
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

            $content->header('积分管理');
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

            $content->header('积分管理');
            $content->description('积分管理');

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
        return Admin::grid(Scoreuser::class, function (Grid $grid) {

            $grid->model()->orderBy('id','desc');
            $grid->id('ID')->sortable();
            
            
            $grid->column('uid','用户')->display(function(){
                $user = User::where(['id'=>$this->uid])->first();
                if(empty($user)) return '';
                return "<a href='/admin/user?id={$user->id}'>".$user->name."</a>";

            });
            $grid->column('aid','活动')->display(function(){
                $act = Activity::where(['id'=>$this->aid])->first();
                if(empty($act)) return '';
                return "<a href='/admin/active?id={$act->id}'>".$act->title."</a>";
            });
            $grid->fen('积分');
            $grid->type('类型')->display(function(){
                $arr = [1=>'报名',2=>'点赞',3=>'阅读',4=>'转发',5=>'邀请'];
                return $arr[$this->type];
            });;


            $grid->at('积分时间');

            $grid->column('zhuid','助力人')->display(function(){
                $user = User::where(['id'=>$this->zhuid])->first();
                if(empty($user)) return '';
                return "<a href='/admin/user?id={$user->id}'>".$user->name."</a>";
            });
            $grid->column('inviteid','被邀请人')->display(function(){
                $user = User::where(['id'=>$this->inviteid])->first();
                if(empty($user)) return '';
                return "<a href='/admin/user?id={$user->id}'>".$user->name."</a>";
            });

            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                
            });
            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });
            $grid->disableCreateButton();
            $grid->filter(function($filter){
                $filter->like('uid', '用户id');
                $filter->equal('type','类型')->select([1=>'报名',2=>'点赞',3=>'阅读',4=>'转发',5=>'邀请']);
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
        return Admin::form(Scoreuser::class, function (Form $form) {



        });
    }
}
