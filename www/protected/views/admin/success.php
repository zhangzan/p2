<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv='Refresh'  content='<?=$second?>;URL=<?=reset($goto)?>'>
<title>消息</title>
<link href="<?=$this->url('css/main.css')?>" rel="stylesheet" type="text/css" />
</head><body>
<br />
<br />
<table border="0" align="center">
  <tr>
    <td><div id="append"></div>
      <div class="container">
        <div class="ajax rtninfo">
          <div class="ajaxbg">
            <h4><?=$title?></h4>
            <present name="message" > </present>
            <present name="error" >
              <p><font color="red"><?=$msg?></font></p>
            </present>
            <p><span id=tS style="color:blue;font-weight:bold"><?=$second?></span> 秒后自动跳转。<br>您也可以,直接点击 
            
            <?php foreach($goto as $key=>$value){?>
				<A HREF="<?=$value?>" ><span class="red"><?=$key?></span></A> 
			<?php }?>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$this->url('img/load.gif')?>" width="32" height="32" /></p>
          </div>
        </div>
      </div></td>
  </tr>
</table>
</body>
</html>