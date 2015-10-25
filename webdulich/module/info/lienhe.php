<script>
function checkemail(){
	var str=document.lienhe.email.value;
	var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
	if (filter.test(str))
		return true;
	else{
		alert("Hãy nhập đúng email của bạn nhé! VD: abc@yahoo.com");
		document.lienhe.email.value="";
		document.lienhe.email.focus();
		return false;
	}
}
</script>
<div class="left_box_content">
   <div class="left_thanh_tieu_de_content">
      <div class="left_text_tieu_de">LIÊN HỆ VÀ GỬI YÊU CẦU</div>
   </div>
   <div style="clear:both; height:20px;"> 
   </div>
   <form action="index.php?mod=lienhe" method="post" name="lienhe" onsubmit="return checkemail();">
      <table id="lienhe">
         <tbody>
            <tr>
               <td colspan="2" style="font-size:18px;color:red;">GỬI YÊU CẦU TẠI ĐÂY</td>
            </tr>
            <tr>
               <td class="style2">
                  Email
               </td>
               <td>
                  <input onclick="if(this.value=='Nhập email của bạn ...') this.value=''" onblur="if(this.value=='') this.value='Nhập email của bạn ...'"  name="email" id="email" style="width:270px;" type="text" value="Nhập email của bạn ...">
               </td>
            </tr>
            <tr>
               <td class="style3">
                  Nội dung
               </td>
               <td class="style4">
                  <textarea onclick="if(this.value=='Nhập yêu cầu của bạn ...') this.value=''" onblur="if(this.value=='') this.value='Nhập yêu cầu của bạn ...'" name="message" id="message" rows="2" cols="20" id="" style="height:155px;width:330px;margin-top: 5px;"></textarea>
               </td>
            </tr>
            <tr>
               <td class="style2">&nbsp;
               </td>
               <td>
                  <input name="" value="Gửi" onclick="" id="" style="width:80px;margin-top: 5px;" type="submit">
               </td>
            </tr>
         </tbody>
      </table>
   </form>
   <div style="height:10px;"></div>
   <table id="lienhe">
      <tbody>
         <tr>
            <td colspan="2" style="font-size:18px;color:red;">HOẶC LIÊN HỆ VỚI CHÚNG TÔI TẠI</td>
         </tr>
         <tr>
            <td class="style2">
               Công ty:
            </td>
            <td>Trường Đại Học Công Nghệ Sài Gòn</td>
         </tr>
         <tr>
            <td class="style2">
               SĐT:
            </td>
            <td>01886 2222 08</td>
         </tr>
         <tr>
            <td class="style2">
               Địa chỉ:
            </td>
            <td><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.973786157605!2d106.6798077!3d10.736503700000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad85f2751b%3A0xb60b345d817370ff!2zMTgwIENhbyBM4buXLCBwaMaw4budbmcgNCwgUXXhuq1uIDgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1415420858521" width="400" height="300" frameborder="0" style="border:0"></iframe></td>
         </tr>
      </tbody>
   </table>
</div>