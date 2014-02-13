<div class="container_wrap">
<div class="content">
<div class="table">
	<table cellspacing="0">
		<tr>
			<th>序号</th>
			<th>公司</th>
			<th>手机</th>
			<th>邮箱</th>
			<th>公司地址</th>
			<th>联系人</th>
			<th>座机</th>
			<th>公司网址</th>
		</tr>

	<?php
	for ($i=0; $i < count($data); $i++) {
		echo '<tr>';
		foreach ($data[$i] as $key => $value) {
			if($key != 'user_id'){
				echo '<td>' . $value . '</td>';
			}
		}
		echo '</tr>';
	}

	?>
	</table>
</div>
	<!-- 表格分页 -->
	<div class="pager">

		<?php
			$pre = $page-1;
			$next = $page+1;
			if($pre > 0){
				echo '<a href="customers.php?page='.$pre.'">上一页</a>';
			}
			for ($i=1; $i <= $total; $i++) {
				if($page == $i){
					echo '<span class="act">'.$i.'</span>';
				}else{
					echo '<a href="customers.php?page='.$i.'">'.$i.'</a>';
				}
			}
			if($next <= $total){
				echo '<a href="customers.php?page='.$next.'">下一页</a>';
			}
		?>
		<span class="total">共<?php echo $len ?>条</span>

	</div>



</div>
</div>