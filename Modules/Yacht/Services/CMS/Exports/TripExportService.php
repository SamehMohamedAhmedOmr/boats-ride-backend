<?php
namespace Modules\Yacht\Services\CMS\Exports;

use Modules\Base\Facade\ExcelExportHelper;
use Modules\Base\Services\Classes\ExportServiceClass;

class TripExportService extends ExportServiceClass
{
    public function prepareData($objects)
    {
        $excel_data = [];
        foreach ($objects as $object) {
            $excel_data [] = [
                'name' => $object['id'],
                'email' => $object['name'],
                'phone' => $object['phone'],
            ];
        }
        return $excel_data;
    }
}
