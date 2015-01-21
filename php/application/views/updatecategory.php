<!DOCTYPE html> 
<html>
<head>
	<title>カテゴリー内容</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<style>
.movie-list thead th,
.movie-list tbody tr:last-child {
    border-bottom: 1px solid #d6d6d6; /* non-RGBA fallback */
    border-bottom: 1px solid rgba(0,0,0,.1);
}
.movie-list tbody th,
.movie-list tbody td {
    border-bottom: 1px solid #e6e6e6; /* non-RGBA fallback  */
    border-bottom: 1px solid rgba(0,0,0,.05);
}
.movie-list tbody tr:last-child th,
.movie-list tbody tr:last-child td {
    border-bottom: 0;
}
.movie-list tbody tr:nth-child(odd) td,
.movie-list tbody tr:nth-child(odd) th {
    background-color: #eeeeee; /* non-RGBA fallback  */
    background-color: rgba(0,0,0,.04);
}
</style>

</head>

<body>
<div data-role="page">

<div data-role="header" style="overflow:hidden;">
<h1>カテゴリー内容</h1>
    <a href="#" data-icon="gear" class="ui-btn-right">設定</a>
    <div data-role="navbar">
        <ul>
            <li><a href="<?php echo site_url("upload");?>">商品追加</a></li>
            <li><a href="<?php echo site_url("setrelationtag");?>">関連づけ</a></li>
            <li><a href="<?php echo site_url("categorylist/getcategory");?>">カテゴリー作成</a></li>

        </ul>
    </div><!-- /navbar -->
</div><!-- /header -->
	<div role="main" class="ui-content">
		<p>
		<form action="http://www4152up.sakura.ne.jp/rdp/php/index.php/categorylist/updatecategory" method="post" data-ajax="false">
<table data-role="table" id="movie-table-custom" data-mode="reflow" class="movie-list ui-responsive">
  <thead>
    <tr>
      <th data-priority="1">ID</th>
      <th data-priority="2">カテゴリー名</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($query as $row):?>
    <tr>

		<th style="vertical-align: middle;"><?php echo $row['ID'];?></th>
		<input type=hidden name="ID" value="<?php echo $row['ID'];?>">
      <td><input type="text" name="name" id="name" value="<?php echo $row['name'];?>">
      </td>
    </tr>

	<?php endforeach;?>
  </tbody>
</table>
			<input type="reset" value="キャンセル" data-inline="true">
			<input type="submit" value="　登録　"  data-inline="true">
</form>
		</p>
	</div>
	
		<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->

</div>
</body>
</html>