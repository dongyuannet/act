<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Yuyue;

class YuyueController extends Controller
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

            $content->header('预约管理');
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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Yuyue::class, function (Grid $grid) {


            $grid->id('ID')->sortable();
            $grid->name('预约人');
            $grid->phone('联系方式');
            $grid->column('need','需求分类')->display(function(){
                $arr = [0=>'橱柜',1=>'衣柜',2=>'木门'];
                if($this->need==='') return "";
                $needArr = explode(',',$this->need);
                $n = [];
                foreach ($needArr as $key => $v) {
                    $n[] = $arr[$v];
                }
                return implode(",",$n);

            });
            $grid->other('其他需求');
            $grid->date('时间');
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                
            });
            $grid->disableCreateButton();
            $grid->filter(function($filter){
                $filter->like('name', '预约人');
                $filter->like('phone', '联系方式');
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
        return Admin::form(Yuyue::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('name', '预约人');
            $form->display('phone', '联系方式');
            $form->display('need', '需求');
            $form->display('other', '其他需求');
            $form->display('date', '时间');
        });
    }
}
