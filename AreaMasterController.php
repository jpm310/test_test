<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller, Session;
use Illuminate\Http\Request;
use App\Repositories\Sint1003Repository\Sint1003RepositoryInterface as Sint1003;
use App\Http\Requests\AreaMaster\SearchAreaRequest;

class AreaMasterController extends Controller
{
  protected $sint1003;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(Sint1003 $sint1003)
  {
    $this->middleware("auth");
    $this->sint1003 = $sint1003;
  }

  public function showListForm(Request $request)
  {
    if (!empty(Session::get("area_lists"))) {
      $area_lists = Session::get('area_lists', array());
      $nendo=$area_lists[0]["nendo"];
      return view("area_master.list", compact('area_lists',"nendo"));
    }
    $area_lists = $this->sint1003->getData();
    Session::put('area_lists', $area_lists);
    $nendo=$area_lists[0]["nendo"];
    return view("area_master.list", compact('area_lists',"nendo"));
  }
  

  public function showListSearch2Form(SearchAreaRequest $request)
  {
    $nendo = $request->nendo;
    $kai = $request->kai;
    $area01 = $request->area01;

    $area_lists = Session::get('area_lists', array());
    $search_lists = $this->sint1003->getSearchData($nendo, $kai, $area01);
    return view("area_master.list_search_aft2", compact("search_lists", "nendo", "kai", "area01", "area_lists"));
  }
}
