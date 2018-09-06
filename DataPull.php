<?php 

	abstract class DataPull{
  
	protected $yearlyAverage; 
	public function getYearlyAverage()
	{
		return $this->yearlyAverage; 
	}
	public function setYearlyAverage($yearlyAverage)
	{
		$this->yearlyAverage = $yearlyAverage;
	}

	abstract public function calculateYearlyTotals($year);
}

?>