<?php
# Cálcular redondeo y formato
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo " REDONDEAR Y DAR FORMATO \n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
$neto = 100333.55;
$iva = 19;
$valor_iva = ($neto * $iva) / 100;
$total = $neto + $valor_iva;

echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "➖ Neto = ".$neto."\n";
echo "➖ IVA = ".$iva."%\n";
echo "➖ Valor IVA = ".$valor_iva."\n";
echo "➖ Total Total = ".round($total,2). "\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
$total2 = sprintf("%1.2f", $total);

echo "➖ CON sprintf = ".$total2."\n";
echo "➖ CON number_format = ".number_format($total, 0,',','.')."\n";

echo "➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
?>