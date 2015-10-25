
<?php
	
	include "../config/config.php";
	include "../config/ini.php";
	$obj = new db();
	
	
	$noiden = utils::getIndex("noiden");
	$result =$obj->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour="."'".$noiden."'");
	
	
	if($noiden=="tn")
	{	
	?>
				<tr id="noiden">
				   <td>Nơi đến:</td>
				   <td >
					  <select name="noiden">
						<?php
							foreach($result as $row)
								{
							?>
							<option value="<?php echo $row["Ma_dia_danh"];?>"><?php echo $row["Ten_dia_danh"]; ?></option>
							<?php
								}
							?>					
					  </select>
				   </td>
				</tr>
			
           
	<?php
	}
	?>
	<?php
	if($noiden=="nn")
	{
	?>
		
          
				<tr id="noiden">
				   <td>Nơi đến:</td>
				   <td >
					  <select name="noiden">
						<?php
							foreach($result as $row)
								{
							?>
							<option value="<?php echo $row["Ma_dia_danh"];?>"><?php echo $row["Ten_dia_danh"]; ?></option>
							<?php
								}
							?>					
					  </select>
				   </td>
				</tr>

         </table>
			
            
         
	<?php	
	}
	?>

