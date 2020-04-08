<?php

namespace App\Repositories\Sint1003Repository;

use Illuminate\Support\Facades\DB;
use App\Repositories\Models\Sint1003;

class Sint1003RepositoryImpl implements Sint1003RepositoryInterface
{
  public function getData()
  {
    return Sint1003::leftjoin("sint1009", "sint1009.test_area_cd", "=", "sint1003.test_area_cd")->groupBy("sint1009.nendo", "sint1003.test_area_cd", "sint1003.test_area_name")->get([
      "sint1009.nendo",
      "sint1003.test_area_cd",
      "sint1003.test_area_name",
      ]);
  }

  public function getSearchData($nendo, $kai, $area01){
    return Sint1003::Join("sint1009", "sint1009.test_area_cd", "=", "sint1003.test_area_cd")->leftJoin("sint1002","sint1003.test_kbn","=","sint1002.test_kbn")->orderBy('area_cd', 'asc')->where("nendo",'=',$nendo)->where('kai','=',$kai)->where("sint1009.test_area_cd",'=',$area01)->groupBy("g1_flg", "g2_flg", "g3_flg", "g4_flg", "g5_flg",'area_cd','area_name','test_area_name',"sint1003.test_area_cd","kyu_name")->get([
      "sint1009.area_cd AS area_cd",
      "sint1009.area_name AS area_name",
      "sint1003.test_area_name AS test_area_name",
      "sint1003.test_area_cd",
      "sint1002.kyu_name AS kyu_name",
      DB::raw("CASE sint1009.g1_flg WHEN '1' THEN N'〇' WHEN '0' THEN N'×' END AS g1_flg"),
      DB::raw("CASE sint1009.g2_flg WHEN '1' THEN N'〇' WHEN '0' THEN N'×' END AS g2_flg"),
      DB::raw("CASE sint1009.g3_flg WHEN '1' THEN N'〇' WHEN '0' THEN N'×' END AS g3_flg"),
      DB::raw("CASE sint1009.g4_flg WHEN '1' THEN N'〇' WHEN '0' THEN N'×' END AS g4_flg"),
      DB::raw("CASE sint1009.g5_flg WHEN '1' THEN N'〇' WHEN '0' THEN N'×' END AS g5_flg"),
    ]);
  }
}
