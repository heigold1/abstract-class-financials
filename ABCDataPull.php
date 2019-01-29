<?php 

require_once "DataPull.php";

class ABCDataPull extends DataPull{
  
	public function calculateYearlyTotals($year){
		
	 	$sumTotal = 0; 
		$data = array("year" => $year);
		$data_string = json_encode($data);

		$ch = curl_init('http://ec2-54-210-42-143.compute-1.amazonaws.com/api-abc/financials.php?year=' . $year);
	  	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	  	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  	curl_setopt($ch, CURLOPT_HTTPHEADER, 
	    		array(
		      	'Content-Type: application/json',                                                  
	      		'Content-Length: ' . strlen($data_string)
	    		)                                                                       
			);                                                                                          

		$result = curl_exec($ch);

		$resultArray = json_decode($result);

		foreach ($resultArray as $monthlyAmount)
		{
			$sumTotal += $monthlyAmount;
		}

		$this->setYearlyAverage($sumTotal/12); 
	}
}


?>