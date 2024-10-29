<?php


if(isset($_GET['statusCode']))
{

echo $_GET['statusCode'];
echo '<br />';
echo $_GET['statusMessage'];

}

?>


   <div class="row">
   <div class="col-lg-4">
<div id="result_inform"> 
	<form action="obrabt.php" method="GET">
		<label>REG_NOM</label>
<input type="text" name='reg_nom' maxlength="6" >
<input type="submit"  value="Otpravit">
		</form>
</div>
	</div>
    </div>


