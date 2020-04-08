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
              <input type="text" name="nendo" value="{{$nendo}}"  size="1">年度
              <label for="kai" class="select">
                <select name="kai" id="kai" class="select_short" tabindex="2">
                  <option value="" selected="">--</option>
                  <option value="1">第1回</option>
                  <option value="2">第2回</option>
                </select>
              </label>
              &nbsp;受験地（2桁）
              <label for="area01" class="select">
                <select name="area01" id="area01" class="select_short" tabindex="3">
                  <option value="" selected="">--</option>
                  @foreach($area_lists as $area_list)
                  <option value="{{$area_list->test_area_cd}}">{{$area_list->test_area_cd}}:{{$area_list->test_area_name}}</option>
                  @endforeach
                </select>
              </label>
              &nbsp;&nbsp;&nbsp;
              <button type="button" class="exec_btn etc_btn_color" onclick="form.submit()" tabindex="3">一覧表示</button>
            </div>
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