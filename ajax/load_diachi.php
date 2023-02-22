
<?
include("config.php");
$new_id        = getValue("id","int","POST",0);
$new_id        = (int)$new_id;

$usc_id       = getValue("usc_id","int","POST",0);
$usc_id       = (int)$usc_id;

if($new_id > 0){
    $db_new = new db_query("SELECT * FROM new LEFT JOIN user ON new.new_user_id = user.usc_id LEFT JOIN map ON new.new_user_id = map.usc_id WHERE new_id = ".$new_id);
    $item = mysql_fetch_assoc($db_new->result);
}
else if($usc_id > 0 && $new_id == 0){
    $db_new = new db_query("SELECT * FROM user LEFT JOIN map ON user.usc_id = map.usc_id WHERE user.usc_id = ".$usc_id);
    $item = mysql_fetch_assoc($db_new->result);
}
?>
<div>
    <div class="map">
        <div id="maps_maparea">
            <div id="maps_mapcanvas" style="margin-top:10px;" class="form-group" style="height:250px;"></div> 
        </div>  
    </div>
    <div class="update_add">
      <p style="font-size: 14px;font-weight: 500;color: #666666;"><span style="color: #f26222;font-size: 14px;font-weight: 500;">Địa chỉ: </span><div style="font-style: italic;float: left;margin-left: -7px;font-weight: 500;font-size: 14px;color: #666666;"><?=($item['usc_address']!= '')?$item['usc_address']:"Chưa xác thực"?></div></p>  
      <input type="text" class="form-control" name="maps[maps_mapcenterlat]" id="maps_mapcenterlat" value="<?if(!empty($item['map_id'])){echo $item['maps_mapcenterlat'];}else{echo '20.871571500000005';}?>" style="display:none;" readonly="readonly">
      <input type="text" class="form-control" name="maps[maps_mapcenterlng]" id="maps_mapcenterlng" value="<?if(!empty($item['map_id'])){echo $item['maps_mapcenterlng'];}else{echo '105.79547500000001';}?>" style="display:none;" readonly="readonly">
      <input type="text" class="form-control" name="maps[maps_maplat]" id="maps_maplat" value="<?if(!empty($item['map_id'])){echo $item['maps_maplat'];}else{echo '20.984826535048562';}?>" style="display:none;" readonly="readonly">
      <input type="text" class="form-control" name="maps[maps_maplng]" id="maps_maplng" value="<?if(!empty($item['map_id'])){echo $item['maps_maplng'];}else{echo '105.79892968521119';}?>" readonly="readonly" style="display:none;">
      <input type="text" class="form-control" name="maps[maps_mapzoom]" id="maps_mapzoom" style="display:none;" value="<?if(!empty($item['map_id'])){echo $item['maps_mapzoom'];}else{echo '14';}?>" readonly="readonly">
    </div>
</div>
<script src="/js/map.js" type="text/javascript"></script>