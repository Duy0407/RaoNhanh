<?
function form($field_name="",$field_type=1,$field_value=0,$field_alias="",$field_size=60,$field_height=6,$field_require=""){
	// $field_type  la kieu : 1  : kieu text box 2 : kieu textarea 3 kieu check box 4 : kieu pictures
	// neu le kieu textarea thi $field_size la so cot con $field_height la so dong
	switch($field_type){
		//kieu hidden
		case 0: 
		?>
			<input type="hidden" name="<?=$field_name?>" id="<?=$field_name?>" size="<?=$field_size?>" value="<?=$field_value?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px">
		<?
		break;
		//kieu text
		case 1:
		?>
			<tr>
				<td  align="right" valign="middle" nowrap class="textBold"><?=$field_alias?></td>
				<td class="form_name">
					<input type="text" name="<?=$field_name?>" id="<?=$field_name?>" size="<?=$field_size?>" value="<?=$field_value?>" class="form"> <font color="#FF0000"><?=$field_require?></font>
				</td>
			</tr>
		<?
		break;
		//kieu textarea
		case 2:
		?>
			<tr>
				<td  align="right" valign="middle" nowrap class="textBold"><?=$field_alias?></td>
				<td class="form_name">
					<textarea class="form" id="<?=$field_name?>" name="<?=$field_name?>" rows="<?=$field_height?>" cols="<?=$field_size?>"><?=$field_value?></textarea> <font color="#FF0000"><?=$field_require?></font>
				</td>
			</tr>
		<?
		break;
		//kieu checkbox
		case 3:
		?>
			<tr>
				<td  align="right" valign="middle" nowrap class="textBold"><?=$field_alias?></td>
				<td class="form_name">
					<input type="checkbox" name="<?=$field_name?>" id="<?=$field_name?>" value="1" <? if($field_value==1) echo "checked=\"checked\"";?>  > <font color="#FF0000"><?=$field_require?></font>
				</td>
			</tr>
		<?
		break;
		//kieu file
		case 4:
		?>
			<tr>
				<td  align="right" valign="middle" nowrap class="textBold"><?=$field_alias?></td>
				<td class="form_name">
					<input type="file" name="<?=$field_name?>" id="<?=$field_name?>" class="form" style="border:solid 1px #7F9DB9" size="<?=$field_size?>">
				</td>
			</tr>
		<?
		break;
		case 7:
		?>
		<tr> 
		  <td align="right" valign="middle" nowrap class="textBold"><?=$field_alias?></td>
		  <td class="textBold">
				<?
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = "../wysiwyg_editor/" ;
				
				$oFCKeditor = new FCKeditor($field_name) ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $field_value;
				$oFCKeditor->Width = $field_size;
				$oFCKeditor->Height = $field_height;
				$oFCKeditor->Create() ;
				?>
		  </td>
		</tr>
		<?
		break;
		case 8:
		?>
		<tr> 
		  <td align="right" valign="middle" nowrap class="textBold">&nbsp;</td>
		  <td class="textBold">
				<input type="button" class="button"  onclick="validateForm();" value="<?=$field_alias?>">
		  </td>
		</tr>
		<?
		break;
		case 11:
		?>
			<tr>
				<td  align="right" valign="middle" nowrap class="textBold"><?=$field_alias?></td>
				<td class="form_name">
					<input type="password" name="<?=$field_name?>" id="<?=$field_name?>" size="<?=$field_size?>" value="<?=$field_value?>" class="form"> <font color="#FF0000"><?=$field_require?></font>
				</td>
			</tr>
		<?
		break;
	}
	
}
function title_form($title,$bgcolor='#f2f2f2'){
	?>
		<tr bgcolor="<?=$bgcolor?>">
			<td colspan="2" class="textBold"><?=$title?></td>
		</tr>
	<?
}
?>