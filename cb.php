
	
	<img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=978020137962&code=EAN13&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0'/>	
	
<script>
function imprimir(){
	document.getElementById("divcontent").style.display = "none";
	print();
}
</script>
<div id="divcontent">
<form method="post">

<label>Product Name or Number</label>
<input type="text" name="barcodeText" class="form-control" value="<?php echo @$_POST['barcodeText'];?>">


<label>Barcode Type</label>
<select name="barcodeType" id="barcodeType" class="form-control">
<option value="Code39" <?php echo (@$_POST['barcodeType'] == 'Code39' ? 'selected="selected"' : ''); ?>>Code39</option>
<option value="Code128" <?php echo (@$_POST['barcodeType'] == 'Code128' ? 'selected="selected"' : ''); ?>>Code128</option>
<option value="EAN13" <?php echo (@$_POST['barcodeType'] == 'EAN13' ? 'selected="selected"' : ''); ?>>EAN13</option>

</select>


<label>Barcode Display</label>
<select name="barcodeDisplay" class="form-control" required>
<option value="horizontal" <?php echo (@$_POST['barcodeDisplay'] == 'horizontal' ? 'selected="selected"' : ''); ?>>Horizontal</option>
<option value="vertical" <?php echo (@$_POST['barcodeDisplay'] == 'vertical' ? 'selected="selected"' : ''); ?>>Vertical</option>
</select>
<input type="number" name="barcodeSize" id="barcodeSize" value="20">
<input type="" name="printText" id="printText" value="false">
<input type="number" name="sizeFactor" id="sizeFactor" value="1">

<input type="number" name="varcols" id="sizeFactor" value="3">
<input type="number" name="varrows" id="sizeFactor" value="10">

<select name="varmostrarcode" class="form-control" required>
<option value="si" <?php echo (@$_POST['varmostrarcode'] == 'si' ? 'selected="selected"' : ''); ?>>si</option>
<option value="no" <?php echo (@$_POST['varmostrarcode'] == 'no' ? 'selected="selected"' : ''); ?>>no</option>
</select>

<input type="text" name="varprecio" id="varprecio" value="" placeholder="precio">


<input type="submit" name="generateBarcode" class="btn btn-success form-control" value="Generate">

</form>
<input type="button" name="" class="" value="imprimir" onClick="imprimir();">
</div>

<style>
.tbcb{
	text-align: center;
}
.tbcb td {
	padding:0;
	
	
}
</style>
<?php
if(isset($_POST['generateBarcode'])) {
$barcodeText = trim($_POST['barcodeText']);
$barcodeType=$_POST['barcodeType'];
$barcodeDisplay=$_POST['barcodeDisplay'];
$barcodeSize=$_POST['barcodeSize'];
$printText=$_POST['printText'];
$sizeFactor=$_POST['sizeFactor'];
$varrows=$_POST['varrows'];
$varcols=$_POST['varcols'];
$varmostrarcode=$_POST['varmostrarcode'];
$varprecio=$_POST['varprecio'];
if($barcodeText != '') {
echo '';
echo "<table border='1' cellspacing='0' cellspadding='0'  >";
for ($i=0;$i<$varrows;$i++){
	echo "<tr>";
	for($e=0;$e<$varcols;$e++){
			echo "<td>";
			echo "<table class='tbcb'cellspacing='0' cellspadding='0' border='0'>";
			echo "<tr><td>";if($varprecio!=""){echo"$varprecio";}else{} echo "</td></tr>";
			echo "<tr><td>";echo"<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=".$barcodeText."&code=".$barcodeType."&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0'/>";echo "</td></tr>";
			echo "<tr><td>";if($varmostrarcode=="si"){echo"$barcodeText";}else{}echo "</td></tr>";
			echo "</table>";
			echo "</td>";
			
			
	}
	echo "</tr>";
}
echo "</table>";
} else {
echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
}
}else{
?>

<?php
}
?>
