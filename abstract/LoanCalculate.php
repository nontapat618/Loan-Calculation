<?php 

abstract class LoanCalculate{
	protected $interestRateYear = 0.035;
	protected $floatingRate = 0.01;
	const AMOUNT_OF_MONTH = 12;
	abstract function calculatePaymentMonthly();

	protected function toDecimalPlace($number=""){
		$number =  round(number_format((float)$number, 2, '.', ''),2);
		return $number;
	}
	
	protected function monthlyPaymentMorgateCalculate($amount="",$interestRate="",$period=""){
		$monthlyPayment = $amount * $interestRate * pow((1 + $interestRate),$period) / ( pow((1 + $interestRate),$period) - 1);
		return $monthlyPayment;
	}
	
		
}

?>