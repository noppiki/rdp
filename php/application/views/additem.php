    <a href="#" data-icon="gear" class="ui-btn-right">設定</a>
    <div data-role="navbar">
        <ul>
            <li><a href="<?php echo site_url("upload");?>"class="ui-btn-active">商品追加</a></li>
            <li><a href="<?php echo site_url("setrelationtag");?>">関連づけ</a></li>
            <li><a href="<?php echo site_url("categorylist/getcategory");?>">カテゴリー作成</a></li>
                    </ul>
    </div><!-- /navbar -->
</div><!-- /header -->
	<div role="main" class="ui-content">
		<p>
			<form action="http://www4152up.sakura.ne.jp/rdp/php/index.php/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data" data-ajax="false">
			<fieldset data-role="controlgroup">
				<legend>カテゴリー</legend>
				<?php echo $cat_str;?>
			</fieldset>
			<?php echo(form_hidden('cat_no', $cat_no));?>
			<label for="text-basic">商品名</label>
			<input type="text" name="itemname" id="itemname" value="">
			<label for="textarea">商品説明</label>
			<textarea cols="40" rows="8" name="description" id="description"></textarea>
			<label for="file">商品画像</label>
			<input type="file" name="upfile">
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