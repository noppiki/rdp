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
    <a href="#" data-icon="gear" class="ui-btn-right">設定</a>
    <div data-role="navbar">
        <ul>
            <li><a href="../upload">商品追加</a></li>
            <li><a href="../setrelationtag">関連づけ</a></li>
            <li><a href="#" class="ui-btn-active">カテゴリー編集</a></li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /header -->
	<div role="main" class="ui-content">
		<p>

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

		<th><?php echo $row['ID'];?></th>
      <td><a href="http://www4152up.sakura.ne.jp/rdp/php/index.php/categorylist/editcategory/<?php echo $row['ID'];?>" data-rel="external">
      <?php echo $row['name'];?></a></td>
    </tr>

	<?php endforeach;?>
  </tbody>
</table>
		</p>
	</div>
	
		<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->

</div>
</body>
</html>