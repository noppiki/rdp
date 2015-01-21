
    <div data-role="navbar">
        <ul>
            <li><a href="<?php echo site_url("upload");?>" class="ui-btn-active">商品追加</a></li>
            <li><a href="#">関連づけ</a></li>
            <li><a href="<?php echo site_url("categorylist/getcategory");?>">カテゴリー作成</a></li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /header -->
	<div role="main" class="ui-content">
		<p>
			<form>
		    <input id="filterTable-input" data-type="search">
			</form>
			
			<?php
			$attributes = array('data-ajax' => 'false'); 
			echo form_open('setrelationtag/send/'.$id,$attributes);?>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="persist">関連づける商品</th>
        </tr>
        </thead>
        <tbody>
            <?php echo $string;?>
        </tbody>
    </table>
    <button type="submit" data-theme="a">登録</button>
		</p>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page -->
</body>
</html>