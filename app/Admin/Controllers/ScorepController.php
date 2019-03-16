<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Scorep;
use App\Models\Brand;
use App\Models\User;
use App\Models\Activity;
use App\Admin\Extensions\ExcelExpoter;

class ScorepController extends Controller
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

            $content->header('积分排名管理');
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

            $content->header('积分排名管理');
            $content->description('积分排名管理');

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
        return Admin::grid(Scorep::class, function (Grid $grid) {

            $grid->model()->orderBy('score','desc');
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

            $grid->zhuan('转发数')->sortable();
            $grid->score('积分数')->sortable();

            
            
            $grid->at('排名统计时间');

            $grid->name('姓名');
            $grid->phone('手机');
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
        return Admin::form(Scorep::class, function (Form $form) {


        });
    }
}
