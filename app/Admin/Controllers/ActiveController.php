<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Activity;
use App\Admin\Extensions\ExcelExpoter;

class ActiveController extends Controller
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

            $content->header('活动管理');
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

            $content->header('活动管理');
            $content->description('活动管理');

            if($r=='detail') $content->body($this->detail()->edit($id));
            if($r=='detail2') $content->body($this->detail2()->edit($id));
            if($r=='detail3') $content->body($this->detail3()->edit($id));
            if($r=='') $content->body($this->form()->edit($id));  
            
        });
    }


    protected function detail()
    {
        return Admin::form(Activity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('title', '名称');
            $form->ueditor('detail','活动详情');
 

            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

        });
    }
    protected function detail2()
    {
        return Admin::form(Activity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('title', '名称');
            $form->ueditor('detail2','报名礼品');
 

            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

        });
    }

    protected function detail3()
    {
        return Admin::form(Activity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('title', '名称');

            $form->map('117.9261302948','29.7561812246','地址');
 

            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

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

            $content->header('添加活动');
            $content->description('添加活动');

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
        return Admin::grid(Activity::class, function (Grid $grid) {


            $grid->id('ID')->sortable();
            $grid->title('名称');
            $grid->phone('手机号');
            $grid->zhuan_num('转发量');
            $grid->view_num('浏览量');
            $grid->sign_num('报名数');
            $grid->zhu_num('助力数');
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $id = $actions->row->id;
                // append一个操作
                $actions->append('<a href="/admin/active/'.$id.'/edit?r=detail" title="活动详情"><i class="fa fa-search-plus"></i></a>');
                $actions->append('<a href="/admin/active/'.$id.'/edit?r=detail2" title="报名礼品"><i class="fa fa-share"></i></a>');

                // $actions->append('<a href="/admin/active/'.$id.'/edit?r=detail3" title="设置地图"><i class="fa fa-object-ungroup"></i></a>');

            });

            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });
            $grid->filter(function($filter){
                $filter->like('title', '名称');

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

        return Admin::form(Activity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '名称')->rules('required');

            $form->multipleImage('pics', '多个配图')->move('pics/')->removable();



            $form->number('points', '热门指数');
            $form->number('zhuan_num', '转发数');
            $form->number('zhu_num', '助力数');
            $form->number('sign_num', '报名数');
            $form->number('view_num', '浏览量');
            $form->number('base', '数值基数');

            $form->text('phone', '手机号')->rules('required');
            $form->text('address', '地址')->rules('required');
            $form->text('location_x', '地址经度');
            $form->text('location_y', '地址纬度');
            // $form->map(39.916527,116.397128,'地址X,Y值');

            $form->datetime('start_at','开始时间')->format('YYYY-MM-DD HH:mm:ss')->rules('required');
            $form->datetime('end_at','结束时间')->format('YYYY-MM-DD HH:mm:ss')->rules('required');


            $form->file('mp3','背景音乐')->move('mp3/');

            $form->image('cust','客服二维码')->move('code/');
            $form->hidden('detail');
            $form->hidden('detail2');

            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

        });
    }
}
