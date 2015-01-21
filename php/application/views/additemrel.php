
    <a href="#" data-icon="gear" class="ui-btn-right">設定</a>
    <div data-role="navbar">
        <ul>
            <li><a href="<?php echo site_url("upload");?>">商品追加</a></li>
            <li><a href="<?php echo site_url("setrelationtag");?>"class="ui-btn-active">関連づけ</a></li>
            <li><a href="<?php echo site_url("categorylist/getcategory");?>">カテゴリー作成</a></li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /header -->
	<div role="main" class="ui-content">
		<p>
			<form>
		    <input id="filterTable-input" data-type="search">
			</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="1">No.</th>
            <th data-priority="persist">商品名</th>
            <th data-priority="2">詳細</th>
        </tr>
        </thead>
        <tbody>
            <?php echo $string;?>
        </tbody>
    </table>
		</p>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page -->
</body>
</html>