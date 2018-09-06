<?php 

require_once "DataPull.php";

class ABCDataPull extends DataPull{
  
	public function calculateYearlyTotals($year){
		
		$sumTotal = 0; 
		$data = array("year" => 2017);
		$data_string = json_encode($data);

		$ch = curl_init('http://ec2-52-41-122-145.us-west-2.compute.amazonaws.com/api-abc/financials.php');
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
		$resultObject = json_decode($result);

		$resultArray = get_object_vars($resultObject->monthly_totals);

		foreach ($resultArray as $monthlyAmount)
		{
			$sumTotal += $monthlyAmount;
		}

		$this->setYearlyAverage($sumTotal/12); 
	}
}


?>