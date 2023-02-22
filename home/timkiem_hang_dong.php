<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_hang = getValue('id_hang', 'int', 'POST', '');
?>
<?php if ($id_dm != "" && $id_hang != ""): ?>
	<!-- LAPTOP -->
	<?php if ($id_dm==98): ?>
		<?php if ($id_hang==1378): ?>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng máy">
		<?php endif ?>
		<?php if ($id_hang!=1378): ?>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
			?>
		        <select name="dongmay" class="form-control share_select2 w_100">
		            <option value="">Dòng máy</option>
		            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                	<? } ?>
		        </select>
		<?php endif ?>
	<?php endif ?>
<!-- Dụng cụ thể thao -->
	<?php if ($id_dm==75): ?>
		<?php if ($id_hang!=8): ?>
			<?
			$list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
			?>
		    	<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại dụng cụ</p>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Loại dụng cụ</option>
		            <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                        <option value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                    <? } ?>
		        </select>
		<?php endif ?>
		<?php if ($id_hang==8): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại dụng cụ</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập loại dụng cụ">
		<?php endif ?>
	<?php endif ?>
<!-- PHỤ KIÊN THỂ THAO -->

	<?php if ($id_dm==105): ?>
		<?php if ($id_hang!=8): ?>
			<?
			$list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
			?>
		    	<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ kiện </p>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Loại phụ kiện </option>
		            <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                        <option value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                    <? } ?>
		        </select>
		<?php endif ?>
		<?php if ($id_hang==8): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ kiện </p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập loại phụ kiện">
		<?php endif ?>
	<?php endif ?>

	<!-- MÁY ẢNH MÁY QUAY -->
	<?php if ($id_dm==6): ?>
		<?php if ($id_hang==34): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập hãng">
		<?php endif ?>
		<?php if ($id_hang!=34): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Hãng</option>
		            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
                	<? } ?>
		        </select>
		<?php endif ?>
	<?php endif ?>

	<!-- ĐIỆN THOẠI DI ĐỘNG -->
	<?php if ($id_dm==7): ?>
		<?php if ($id_hang==1683): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập hãng">
		<?php endif ?>
		<?php if ($id_hang!=1683): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
			?>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Dòng máy</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
		        </select>
		<?php endif ?>
	<?php endif ?>

	<!-- MÁY TÍNH BẢNG -->
	<?php if ($id_dm==35): ?>
		<?php if ($id_hang==1694): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập hãng">
		<?php endif ?>
		<?php if ($id_hang!=1694): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
			?>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Dòng máy</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
		        </select>
		<?php endif ?>
	<?php endif ?>

	<!-- TIVI LOA AMPLY MÁY NGHE NHẠC -->
	<?php if ($id_dm==36): ?>

		<?php if ($id_hang==52): ?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
				<?
				$list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_hang AND `id_danhmuc` = $id_dm ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Hãng</option>
		            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
		                <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
		            <? } ?>
			        </select>
	    	</div>

	    	<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích thước</p>
				<?
				$list_mh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_hang ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Kích thước</option>
		            <? while ($row_mh = mysql_fetch_assoc($list_mh->result)) { ?>
	                    <option value="<?= $row_mh['id_manhinh'] ?>"><?= $row_mh['ten_manhinh'] ?></option>
		            <? } ?>
			        </select>
	    	</div>

	    	<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kết nối internet</p>
				
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Kết nối internet</option>
		            	<option value="1" >Có</option>
	                	<option value="2">Không</option>
			        </select>
	    	</div>

	    	<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Độ phân giải</p>
				<?
				
				$list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_hang ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Độ phân giải</option>
		            <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
	                        <option value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
		            <? } ?>
			        </select>
	    	</div>

	    	<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại TV</p>
				<?
				$list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại TV</option>
		            <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                    <option value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang==53): ?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
				<?
				$list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_hang AND `id_danhmuc` = $id_dm ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Hãng</option>
		            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
		                <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
			<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại loa</p>
				<?
				$list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại loa</option>
		            <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                    <option value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
	    	<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Công suất</p>
				<?
				$list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_hang ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Công suất</option>
		            <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                    <option value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang==54||$id_hang==57): ?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
				<?
				$list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_hang AND `id_danhmuc` = $id_dm ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Hãng</option>
		            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
		                <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
	    	<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Công suất âm thanh</p>
				<?
				$list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_hang ");
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Công suất âm thanh</option>
		            <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                    <option value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
		<?php endif ?>

	<?php endif ?>

	<!-- PHỤ KIỆN LINH KIỆN -->
	<?php if ($id_dm==37): ?>
		<?php if ($id_hang==1): ?>
			<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ kiện</p>
				<?
				$querypk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $id_dm and `id_cha`= 0");
        		$list_phukien = $querypk->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại phụ kiện</option>
		             <? foreach ($list_phukien as $key => $value) { ?>
		                <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang==2): ?>
			<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại linh kiện</p>
				<?
				$querylk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $id_dm and `id_cha`= 1");
        		$list_linhkien = $querylk->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại linh kiện</option>
		             <? foreach ($list_linhkien as $key => $value) { ?>
		                <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
		            <? } ?>
			        </select>
	    	</div>
		<?php endif ?>

	<?php endif ?>

	<?php if ($id_dm==99): ?>
		<?
		$query = new db_query("SELECT `id`, `ten_hang`  FROM `hang` WHERE `id_danhmuc` = $id_dm and `id_parent`= $id_hang ");
		?>
		<div class="thuoc_tinh w_100 mb_20 ">
	        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng </p>
		        <select data="<?= $id_dm ?>" onchange="hang_doi_timkiem2(this)" name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Hãng</option>
	             <? while ($row_hang = mysql_fetch_assoc($query->result)) { ?>
					<option value="<?= $row_hang['id'] ?>"><?= $row_hang['ten_hang'] ?></option>
	            <? } ?>
		        </select>
    	</div>
	<?php endif ?>

	<?php if ($id_dm==8): ?>
		<?
		$query = new db_query("SELECT `id`, `ten_hang`  FROM `hang` WHERE `id_danhmuc` = $id_dm and `id_parent`= $id_hang ");
		?>
		<?php if ($id_hang==210): ?>
			<?
			$query_dx = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = 210");
    		$sql_dx = $query_dx->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
		        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe đạp thể thao </p>
			        <select  name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Dòng xe đạp thể thao</option>
		             <? foreach ($sql_dx as $dx) : ?>
                        <option value="<?= $dx['id'] ?>"><?= $dx['ten_loai'] ?></option>
                    <? endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==9): ?>
		<?php if ($id_hang != 1286): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang ");
			?>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Dòng xe</option>
	                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
	                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
	                <? } ?>
		        </select>
		<?php endif ?>
		<?php if ($id_hang == 1286): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng xe">
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==10): ?>
		<?php if ($id_hang != 1363): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang  ");
			?>
	        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
	            <option value="">Dòng xe</option>
	            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
	                <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
	            <? } ?>
	        </select>
		<?php endif ?>
		<?php if ($id_hang == 1363): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng xe">
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==56): ?>
		<?php if ($id_hang == 2103 || $id_hang == 2105): ?>	
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dung tích</p>
				<?
				$query = new db_query("SELECT * FROM dung_luong where id_cha=" . $id_hang . " and id_danhmuc= " . $id_dm . " ");
	    		$dungtich = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Dung tích</option>
			            <?php foreach ($dungtich as $key => $value) : ?>
			                <option value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang != 2107): ?>	
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
				<?
				$query = new db_query("SELECT * FROM hang WHERE id_parent=" . $id_hang . "  and id_danhmuc=" . $id_dm . "");
    			$hang = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Hãng</option>
			            <?php foreach ($hang as $key => $value) : ?>
			                <option value="<?= $value['id'] ?>"><?= $value['ten_hang'] ?></option>
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
		<?php if ($id_hang == 2104): ?>	
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Công suất</p>
				<?
				$query = new db_query("SELECT * FROM dung_luong where id_cha=" . $id_hang . " and id_danhmuc= " . $id_dm . " ");
    			$congsuat = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Công suất</option>
			            <?php foreach ($congsuat as $key => $value) : ?>
			                <option value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang == 2106): ?>	
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khối lượng giặt</p>
				<?
				$query = new db_query("SELECT * FROM dung_luong where id_cha=" . $id_hang . " and id_danhmuc= " . $id_dm . " ");
    			$khoiluong = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Khối lượng giặt</option>
				        <?php foreach ($khoiluong as $key => $value) : ?>
				            <option value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
				        <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==57): ?>
		<?php if ($id_hang !=37): ?>	
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
				<?
				$query= new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha` = $id_hang AND `id_danhmuc` = $id_dm ");
    			$loai = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Chọn loại sản phẩm</option>
			            <?php foreach ($loai as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

	<?php endif ?>

	<?php if ($id_dm==61): ?>
		<div class="thuoc_tinh w_100 mb_20 ">
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại mỹ phẩm</p>
			<?
			$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
			$result = $query->result_array();
			?>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Loại mỹ phẩm</option>
		            <?php foreach ($result as $key => $rows): ?>
		                <option value="<?=$rows['id']?>"><?=$rows['ten_loai']?></option>
		            <?php endforeach ?>
		        </select>
    	</div>

    	<div class="thuoc_tinh w_100 mb_20 ">
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
			<?
			$query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = '$id_hang'");
			$sql_hang = $query_hang->result_array();
			?>
		        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
		            <option value="">Hãng</option>
		            <?php foreach ($sql_hang as $key => $rows): ?>
		                <option value="<?=$rows['id']?>"><?=$rows['ten_hang']?></option>
		            <?php endforeach ?>
		        </select>
    	</div>

	<?php endif ?>

	<?php if ($id_dm==78): ?>
		<?php if ($id_hang==2||$id_hang==3||$id_hang==5): ?>
			<?
			$query= new db_query("SELECT * FROM loai_chung where id_cha=".$id_hang." and id_danhmuc= ".$id_dm." ");
    		$loai = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại sản phẩm</option>
			            <?php foreach ($loai as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang!=5): ?>
			<?
			$query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=".$id_hang."  and id_danhmuc=".$id_dm."");
    		$chat = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Chất liệu</option>
			            <?php foreach ($chat as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['name']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==79): ?>
		<?php if ($id_hang==8||$id_hang==9||$id_hang==12||$id_hang==13||$id_hang==14||$id_hang==15): ?>
			<?
			$query= new db_query("SELECT * FROM loai_chung where id_cha=".$id_hang." and id_danhmuc= ".$id_dm." ");
    		$loai = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại sản phẩm</option>
			            <?php foreach ($loai as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang==8||$id_hang==9||$id_hang==12||$id_hang==13||$id_hang==11): ?>
			<?
			$query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=".$id_hang."  and id_danhmuc=".$id_dm."");
    		$chat = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Chất liệu</option>
			            <?php foreach ($chat as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['name']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

		<?php if ($id_hang==14): ?>
			<?
			$query = new db_query("SELECT * FROM nhom_sanpham_hinhdang WHERE id_cha=".$id_hang."  and id_danhmuc=".$id_dm."");
    		$hinhdang = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hình dáng</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Hình dáng</option>
			            <?php foreach ($hinhdang as $key => $value): ?>
				            <option value="<?=$value['id']?>"><?=$value['name']?></option>    
				        <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==80): ?>
		<?php if ($id_hang==18||$id_hang==19): ?>
			<?
			$query= new db_query("SELECT * FROM loai_chung where id_cha=".$id_hang." and id_danhmuc= ".$id_dm." ");
    		$loai = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại sản phẩm</option>
			            <?php foreach ($loai as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>

			<?
			$query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=".$id_hang."  and id_danhmuc=".$id_dm."");
    		$chat = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Chất liệu</option>
			            <?php foreach ($chat as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['name']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
	<?php endif ?>

	<?php if ($id_dm==81): ?>
		<?php if ($id_hang!= 2064): ?>
			<?
			$query = new db_query("SELECT * FROM hang WHERE id_parent=".$id_hang."  and id_danhmuc=".$id_dm."");
        	$thuonghieu = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Thương hiệu</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Thương hiệu</option>
			           	<?php foreach ($thuonghieu as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['ten_hang']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
		
		<?php if ($id_hang == 2060): ?>
			<?
			$query = new db_query("SELECT * FROM nhom_sanpham_hinhdang WHERE id_cha=".$id_hang."  and id_danhmuc=".$id_dm."");
        	$hinhdang = $query->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hình dáng</p>
				<?
				$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_hang'");
				$result = $query->result_array();
				?>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Hình dáng</option>
			           	<?php foreach ($hinhdang as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['name']?></option>    
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
	<?php endif ?>

	<?php if ($id_dm==82): ?>
		<?php if ($id_hang!= 30): ?>
			<?
			$query= new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha`= $id_hang AND `id_danhmuc`=  $id_dm  ");
		    $loai = $query->result_array();

		    $query2 = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = $id_hang  AND `id_danhmuc` = $id_dm ");
		    $chat = $query2->result_array();
			?>
			<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Loại sản phẩm</option>
			           	<?php foreach ($loai as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>
			            <?php endforeach ?>
			        </select>
	    	</div>

	    	<div class="thuoc_tinh w_100 mb_20 ">
				<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
			        <select name="ten_thuoc_tinh" class="form-control share_select2 w_100">
			            <option value="">Chất liệu</option>
			            <?php foreach ($chat as $key => $value): ?>
			                <option value="<?=$value['id']?>"><?=$value['name']?></option>
			            <?php endforeach ?>
			        </select>
	    	</div>
		<?php endif ?>
	<?php endif ?>

<?php endif ?>
