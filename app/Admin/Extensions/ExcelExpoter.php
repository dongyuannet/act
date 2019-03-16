<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\JuanBmExtend;

class ExcelExpoter extends AbstractExporter
{
    public function export()
    {
        Excel::create('Filename', function($excel) {

            $excel->sheet('Sheetname', function($sheet) {

                // 这段逻辑是从表格数据中取出需要导出的字段
                $rows = collect($this->getData())->map(function ($item) {
                    // return array_only($item, ['id', 'activity_id', 'order_num', 'hd_title', 'money']);
                    $ex = JuanBmExtend::where(['order_num'=>$item['order_num']])->get()->toArray();
                    foreach ($ex as $k => $v) {
                        $item[$k+100] = $v['name'].':'.$v['value'];
                    }
                    return $item;
                });

                $sheet->rows($rows);

            });

        })->export('xls');
    }
}