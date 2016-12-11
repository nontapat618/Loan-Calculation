<?php 

abstract class LoanCalculate{
	protected $interestRateYear = 0.035;
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