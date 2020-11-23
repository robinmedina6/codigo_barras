<?php

$barcodeSize=20;
$sizeFactor=1;
$varcols=5;
$varrows=12;
$varprecio="DESCRIPCION-$10000";


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
}
?>
<script>
function imprimir(){
	document.getElementById("divcontent").style.display = "none";
	print();
}
/*funcion creada para modificar la resolucion de la imagen se encontro que no lee codabar*/
function imgs(){
	
	var element = document.querySelector(".barcode");
	var style=getComputedStyle(element);
	var valto=parseInt(style.height);
	var vancho=parseInt(style.width);
	var nvalto=(valto*10/100);
	var nvancho=(vancho*10/100);
	element.style.height=nvalto+"px";
	element.style.width=nvancho+"px";
	
	}
</script>
<div id="divcontent">
<form method="post">
<table border="1">
<tr><td><label>Codigo</label></td><td><label>Tipo</label></td><td><label>Orientacion</label></td><td><label>Alto</label></td><td><label>Ancho</label></td><td><label>columnas</label></td><td><label>Filas</label></td><td><label>verCodigo</label></td><td><label>EtiquetaTXT</label></td></tr>

<tr>
	<td><input type="text" name="barcodeText" class="form-control" value="<?php echo @$barcodeText;?>"></td>
    <td>
<select name="barcodeType" id="barcodeType" class="form-control">
<option value="code128" <?php echo (@$barcodeType == 'code128' ? 'selected="selected"' : ''); ?>>Code128</option>
<option value="code39" <?php echo (@$barcodeType == 'code39' ? 'selected="selected"' : ''); ?>>Code39</option>
<option value="codabar" <?php echo (@$barcodeType == 'codabar' ? 'selected="selected"' : ''); ?>>Codabar</option>
</select>
	</td>
    
    <td>
    <select name="barcodeDisplay" class="form-control" required>
<option value="horizontal" <?php echo (@barcodeDisplay == 'horizontal' ? 'selected="selected"' : ''); ?>>Horizontal</option>
<option value="vertical" <?php echo (@barcodeDisplay == 'vertical' ? 'selected="selected"' : ''); ?>>Vertical</option>
</select>
    </td>
    <td><input type="number" name="barcodeSize" id="barcodeSize" value="<?php echo @$barcodeSize;?>"></td>
    <td><input type="double" name="sizeFactor" id="sizeFactor" value="<?php echo @$sizeFactor;?>"></td>
    <td><input type="number" name="varcols" id="varcols" value="<?php echo @$varcols;?>"></td>
    <td><input type="number" name="varrows" id="varrows" value="<?php echo @$varrows;?>"></td>
    <td>
    <select name="varmostrarcode" class="form-control" required>
<option value="si" <?php echo (@$varmostrarcode == 'si' ? 'selected="selected"' : ''); ?>>si</option>
<option value="no" <?php echo (@$varmostrarcode == 'no' ? 'selected="selected"' : ''); ?>>no</option>
</select>
    </td>
    <td><input type="text" name="varprecio" id="varprecio" value="<?php echo @$varprecio;?>" placeholder="Texto"></td></tr>
    
    <tr><td>
    <input type="hidden" name="printText" id="printText" value="false">
    <input type="submit" name="generateBarcode" class="btn btn-success form-control" value="Generate">
    </td></tr>






</table>
</form>
<input type="button" name="" class="" value="imprimir" onClick="imprimir();">
</div>

<style>
.tbcb{
	text-align: center;
	font-family:calibri, "Calibri Light", Cambria;
	font-size:18px;
}
.descripcion{
	font-weight:bold;
	}
.tbcb td {
	padding:0;
	
	
}
input[type='number']{
	width:40px;
	}
.barcode{
	width:auto;
	height:auto;
	
	}
</style>
<?php
if(isset($_POST['generateBarcode'])) {
if($barcodeText != '') {
echo '';
echo "<table border='1' cellspacing='0' cellspadding='0'  >";
for ($i=0;$i<$varrows;$i++){
	echo "<tr>";
	for($e=0;$e<$varcols;$e++){
			echo "<td>";
			echo "<table class='tbcb'cellspacing='0' cellspadding='0' border='0'>";
			echo "<tr><td class='descripcion' >";if($varprecio!=""){echo"$varprecio";}else{} echo "</td></tr>";
			echo "<tr><td>";echo'<img id="imgbarcode'.$i.$e.'" class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'&sizefactor='.$sizeFactor.'"/>';echo "</td></tr>";
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
