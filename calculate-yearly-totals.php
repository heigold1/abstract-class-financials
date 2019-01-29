<?php 

require "./ABCDataPull.php"; 
require "./XYZDataPull.php"; 

$dataPullABC = new ABCDataPull();
$dataPullABC->calculateYearlyTotals(2018);
$yearlyAverageABC = number_format($dataPullABC->getYearlyAverage(), 2);
echo "Yearly average for company ABC is $" . $yearlyAverageABC;
  
echo "<br><br>";


$dataPullXYZ = new XYZDataPull();

$dataPullXYZ->calculateYearlyTotals(2018);
$yearlyAverageXYZ = number_format($dataPullXYZ->getYearlyAverage(), 2);

echo "Yearly average for company XYZ is $" . $yearlyAverageXYZ; 

?> 