<?php

    /**
     * @var [[]] $arrs
     */
    function max_arr($arrs)
    {
        $max_arr = [];
        foreach ($arrs as $arr) {
            $max_arr = count($arr) > count($max_arr)  ? $arr : $max_arr;
        }
        return $max_arr;
    }

    /**
     * @var  $arr [obj]
     * @var  $fileName string
     * @var  $description string
     * @var  $sheetTitle []
     */

    function get_cell_map() {
        return range('A','Z');
    }

    function arrs_2_excel($arr, $fileName, $description, $sheetTitle)
    {

        $titleMap = [
            'name' => '名称',
            'id' => 'id',
            'current_number' => '当前集数',
            'all_number' => '总集数',
            'cast_member' => '主演/主持人',
            'platform' => '平台',
            'day_play_counts' => '天播放量',
            'avg_play' => '集均播放量',
            'all_play_counts' => '总播放量',
            'time_at' => '时间',
            'type' => '类型',

        ];

        $objPHPExcel = new PHPExcel();
        $creator = "dataavi.cg.com";
        $objPHPExcel->getProperties()->setCreator($creator);
        $objPHPExcel->getProperties()->setLastModifiedBy($creator);
        $objPHPExcel->getProperties()->setDescription($description);
        $objPHPExcel->setActiveSheetIndex(0);

        $cellMap = get_cell_map();
        $keys = [];
        foreach ($arr as &$obj) {
            $keys = array_keys((array)$obj);
            $obj = array_values((array)$obj);
        }
        unset($obj);
        foreach ($keys as &$value) {
                $value = empty($titleMap[$value]) ? $value : $titleMap[$value];
        }
        unset($value);
        array_unshift($arr, $keys);
        foreach ($arr as $row => $obj) {
            foreach ($obj as $col => $value) {
                $objPHPExcel->getActiveSheet()->SetCellValue($cellMap[$col] . (string)($row + 1), $value);
            }
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $dir = env("DOWN_LOAD_FILE", "/MyApp/files/upload/");
        $file = $dir . $fileName . '.xlsx';
        $objWriter->save($file);
        return $file;
    }
?>