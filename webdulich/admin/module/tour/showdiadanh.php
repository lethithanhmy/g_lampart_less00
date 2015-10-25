
<?php
	
	include "../../../config/config.php";
	include "../../../config/ini.php";

	
	$obj_dd = new db();
	$noiden = utils::getIndex("loai");
	$result_dd =$obj_dd->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour="."'".$noiden."'");
	?>
        <tr id="diadanh">
           <td>
           <?php
            foreach($result_dd as $row_dd)
                {
                    ?>
                    <input name="dds[]" type="checkbox" value="<?php echo $row_dd["Ma_dia_danh"];?>" /><?php echo $row_dd["Ten_dia_danh"];?><br />
                    <?php
                }
            ?>		
           
           </td>
        </tr>
			



