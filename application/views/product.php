<h1>PRODUCT</h1>

<table width="100%">
<?php
if(!empty($product_list)) {
	foreach($product_list as $v) {
		?>
		<tr>
			<th><a href="<?=base_url('product_detail/'.$v['id'].'/'.urlencode($v['title']))?>"><?=$v['title']?></a></th>
			<td><?=$v['price']?></td>
		</tr>
		<?php
	}
}
?>
</table>