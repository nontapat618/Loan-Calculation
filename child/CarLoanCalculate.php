<?php 

include("../abstract/LoanCalculate.php");
class CarLoanCalculate extends LoanCalculate{
	
	private $amount;
	private $interestRate;
	private $period;
	public  $monthlyPayment;
	
	public function calculatePaymentMonthly($amount="",$period=""){
				
		$interestRateYear = 0.01;
		$interestRate = $interestRateYear / 12 ; 
		$monthlyPayment = $amount * $interestRate * pow((1 + $interestRate),$period) / ( pow((1 + $interestRate),$period) - 1);
		
		$interestSum = 0;
		$remainingAmount = $amount;
		
		
		for ($x = 1; $x <= $period; $x++) {
			
			$interestmonthly = $remainingAmount * $interestRateYear * 30 / 360;
			$interestSum = $interestSum + $interestmonthly;
			$diffmoney   = $monthlyPayment - $interestmonthly;
			$remainingAmount = $remainingAmount - $diffmoney;
			
		}

		$payment = array();
		$payment['monthlyPayment'] = $monthlyPayment;
		$payment['interestSum'] = $interestSum;
		
		$payment['monthlyPayment'] =  number_format((float)$payment['monthlyPayment'], 2, '.', '');
		$payment['interestSum'] = number_format((float)$payment['interestSum'], 2, '.', '');
		
		echo "<b>Monthly Payment ".$payment['monthlyPayment']."</b><br/> <b>Total Interest ".$payment['interestSum']."</b>";
		
	}
	
}


if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $carLoanCalculate = new CarLoanCalculate;
	
	
	if(isset($_POST['amount']) && !empty($_POST['amount']) && isset($_POST['period']) && !empty($_POST['period']) && isset($_POST['payback']) && !empty($_POST['payback']) && $_POST['amount'] > 0 && $_POST['period'] > 0){
	
		$amount = $_POST['amount']; 
		$period = $_POST['period'];

		$payback = $_POST['payback'];
		
		if($payback == "Yearly"){
			$period = $period * 12;
		}	

		
		switch($action) {
			case 'calculatePaymentMonthly' : $carLoanCalculate->calculatePaymentMonthly($amount,$period); break;
		}

	}else{
		echo "null";
	}
	
}


?>