<!DOCTYPE html> 
<html>
<head>
	<title>商品追加</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>

<body>
<div data-role="page">

<div data-role="header" style="overflow:hidden;">
<h1>商品追加</h1>
    <a href="#" data-icon="gear" class="ui-btn-right">設定</a>
    <div data-role="navbar">
        <ul>
            <li><a href="#">商品追加</a></li>
            <li><a href="#">関連づけ</a></li>
            <li><a href="#">カテゴリー作成</a></li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /header -->
	<div role="main" class="ui-content">
		<p>
		<form action="http://www4152up.sakura.ne.jp/rdp/php/index.php/additem" method="post" data-ajax="false">
			<fieldset data-role="controlgroup">
				<legend>カテゴリー</legend>
				<?php readfile('http://www4152up.sakura.ne.jp/rdp/php/index.php/categorylist/');?>
			</fieldset>
			<label for="text-basic">商品名</label>
			<input type="text" name="itemname" id="itemname" value="">
			<label for="textarea">商品説明</label>
			<textarea cols="40" rows="8" name="description" id="description"></textarea>
			<label for="file">商品画像</label>
			<input type="file" name="image" id="image" value="">
			<input type="button" value="キャンセル" data-inline="true">
			<input type="submit" value="　登録　"  data-inline="true">
		</form>
		</p>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page -->
</body>
</html>