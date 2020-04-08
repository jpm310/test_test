<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no, email=no, address=no">
  @include('common.style')
  @include('common.js')
  <title>受験地（４桁）一覧表示</title>
</head>
<!-- ▼BODY部 スタート -->

<body onload="">
  <a name="top" id="top"></a>
  <div id="allWrap" class="nav_l2">
    <!--▼HEADER-->
    @include('common.header')
    <!--▼CONTENTS-->
    <div id="contents">
      <section class="main">
        <form method="post" action="{{route('area_master_list_search_aft')}}">
          <input type="hidden" name="search" value="search">
          @csrf
          <h1>受験地（４桁）一覧表示</h1>
          @if(count($errors)>0)
          <ul>
            @foreach($errors->all() as $error)
            <li><span style="color:red;padding-left:300px">{{$error}}</span></li>
            @endforeach
          </ul>
          @endif
          <div align="center">
            <div class="inner_c">
              <input type="text" name="nendo" value="{{$nendo}}" tabindex="1" readonly maxlength="4" size="4">年度
              <input type="text" name="kai" value="第{{$kai}}回" size="1" disabled>
              <input type="hidden" name="kai" value="{{$kai}}">
              <!-- <label for="kai" class="select">
                <select name="kai" id="kai" class="select_short" tabindex="2">
                  <option value="1" @if($kai=='1' ) selected @endif>第1回</option>
                  <option value="2" @if($kai=='2' ) selected @endif>第2回</option>
                </select>
              </label> -->
              &nbsp;受験地（2桁）
              <label for="area01" class="select">
                <select name="area01" id="area01" class="select_short" tabindex="3">
                  @if(isset($search)&&$area01!==null)
                  <option value="" selected="">--</option>
                  <option value="{{$search_lists[0]->test_area_cd}}" selected>{{$search_lists[0]->test_area_cd}}:{{$search_lists[0]->test_area_name}}</option>
                  @foreach($area_lists as $area_list)
                  <option value="{{$area_list->test_area_cd}}">{{old($area_list->test_area_cd,$area_list->test_area_cd)}}:{{$area_list->test_area_name}}</option>
                  @endforeach
                  
                  @else
                  <option value="" selected="">--</option>
                  @foreach($area_lists as $area_list)
                  <option value="{{$area_list->test_area_cd}}">{{old($area_list->test_area_cd,$area_list->test_area_cd)}}:{{$area_list->test_area_name}}</option>
                  @endforeach
                  @endif
                  
                </select>
              </label>
              &nbsp;&nbsp;&nbsp;
              <button type="button" class="exec_btn etc_btn_color" onclick="form.submit()" tabindex="4">一覧表示</button>
            </div>
            <br>
            <br>
            <br>
            <div id="search_result">
              <p style="margin:auto;text-align:left">■検索結果</p>
              <p style="margin:auto;text-align:right">{{$search_lists->count()}}件</p>
            </div>

            <table>
              <thead>
                <tr bgcolor="#e0ffff">
                  <th width="8%">年度</th>
                  <th width="2%">回</th>
                  <th width="20%">受験地（2桁）</th>
                  <th width="20%">受験地（4桁）</th>
                  <th width="10%">1級</th>
                  <th width="10%">準1級</th>
                  <th width="10%">2級</th>
                  <th width="10%">準2級</th>
                  <th width="10%">3級</th>
                </tr>
              </thead>
              <tbody>
                @if($search_lists)
                @foreach($search_lists as $list)
                <tr>
                  <td style="padding:0em 0.25em;">2020</td>
                  <td style="padding:0em 0.25em;">1</td>
                  <td style="padding:0em 0.25em;">{{$list->test_area_cd}}:{{$list->test_area_name}}</td>
                  <td style="padding:0em 0.25em;">{{$list->area_cd}}：{{$list->area_name}}</td>
                  <td style="padding:0em 0.25em;text-align:center">{{$list->g1_flg}}</td>
                  <td style="padding:0em 0.25em;text-align:center">{{$list->g2_flg}}</td>
                  <td style="padding:0em 0.25em;text-align:center">{{$list->g3_flg}}</td>
                  <td style="padding:0em 0.25em;text-align:center">{{$list->g4_flg}}</td>
                  <td style="padding:0em 0.25em;text-align:center">{{$list->g5_flg}}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </form>
      </section>
    </div>
    <!--▲CONTENTS-->
  </div>

  <!--▼FOOTER-->
  @include('common.footer')

</body>

</html>