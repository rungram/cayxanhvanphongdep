<?php
function get_main_list()
	{
		$sql="select * from table_download_list order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>




<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=download&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	    	     <b>Danh mục:</b><?=get_main_list();?><br /><br />
    <b>Tên việt</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
     <b>Tên anh</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
      <b>Tên trung</b> <input type="text" name="ten_cn" value="<?=@$item['ten_cn']?>" class="input" /><br /><br>
    <?php if ($_REQUEST['act']==edit_cat)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_download.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=download&act=man_list'" class="btn" />
</form>