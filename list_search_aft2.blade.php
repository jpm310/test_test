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
  <form method="post" action="{{route('area_master_list')}}">
    @csrf
    <a name="top" id="top"></a>
    <div id="allWrap" class="nav_l2">
      <!--▼HEADER-->
      <!--▼CONTENTS-->
      <div id="contents">
        <section class="main">
          <form method="post">
            <h1>受験地（４桁）一覧表示</h1>
            <div align="center">
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
              <button onclick="back()" class="exec_btn error_btn_color">閉じる</button>
          </form>
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