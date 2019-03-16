<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Scorerule;
use App\Admin\Extensions\ExcelExpoter;

class ScoreruleController extends Controller
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

            $content->header('积分规则');
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

            $content->header('积分规则');
            $content->description('积分规则');

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

            $content->header('添加规则');
            $content->description('添加规则');

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
        return Admin::grid(Scorerule::class, function (Grid $grid) {


            $grid->id('ID')->sortable();
            $grid->name('名称');
            $grid->min('最小值');
            $grid->max('最大值');
            
            $grid->filter(function($filter){
                $filter->like('name', '名称');

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
        return Admin::form(Scorerule::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '名称');
            $form->number('min', '最小值');
            $form->number('max', '最大值');
            // $form->display('created_at', '创建时间');
            /*$form->disableSubmit();
            $form->disableReset();*/

        });
    }
}
