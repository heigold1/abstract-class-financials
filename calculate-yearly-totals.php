<?php 

require "./ABCDataPull.php"; 
require "./XYZDataPull.php"; 


$dataPullABC = new XYZDataPull();
$dataPullABC->calculateYearlyTotals(2017);
echo "Yearly average for company ABC is $" . number_format($dataPullABC->getYearlyAverage(), 2);
  
echo "<br><br>";

$dataPullXYZ = new ABCDataPull();
$dataPullXYZ->calculateYearlyTotals(2017);
echo "Yearly average for company XYZ is $" . number_format($dataPullXYZ->getYearlyAverage(), 2);

?> 