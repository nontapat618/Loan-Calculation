<?php 

include("../abstract/LoanCalculate.php");
class CarLoanCalculate extends LoanCalculate{
	
	protected $interestRateYear = 0.01;
	public function calculatePaymentMonthly($amount="",$period="",$floatRated=""){
		
		// Init Value
		$interestRateYear = $this->interestRateYear;		
		$interestSum = 0;
		$remainingAmount = $amount;
		$amountOfMonth = LoanCalculate::AMOUNT_OF_MONTH;
		$interestRate = $interestRateYear / $amountOfMonth ; 
		
		// Init Table
		include('../init_table.php');		
		
		for ($x = 1; $x <= $period; $x++) {
						
			if($x % $amountOfMonth == 0 && $x <=$amountOfMonth && $floatRated == 1){
				$interestRateYear = $interestRateYear + $this->floatingRate;
				$interestRate = $interestRateYear / $amountOfMonth ; 
			}
			
			// Calculate Payment Montyly
			$monthlyPayment = parent::monthlyPaymentMorgateCalculate($amount,$interestRate,$period);

			// Calculate Principal Interest By Effective Rate
			$interestmonthly = $remainingAmount * $interestRateYear / $amountOfMonth;
			$interestSum = $interestSum + $interestmonthly;
			$principal   = $monthlyPayment - $interestmonthly;
			$remainingAmount = $remainingAmount - $principal;

			
			// To Decimal Place
			$principal =  parent::toDecimalPlace($principal);
			$interestmonthly = parent::toDecimalPlace($interestmonthly);
			$monthlyPayment = parent::toDecimalPlace($monthlyPayment);
									
			// Append Row In Table
			include('../table_row.php');
			
			
		}

		$interestSum = parent::toDecimalPlace($interestSum);		
		echo "</table>";
		echo "<b>Total Interest ".$interestSum."</b>";
				
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

		$floatRated = 0;
		
		if(isset($_POST['isFloatRated']) && !empty($_POST['isFloatRated'])){
			$floatRated = 1;
		}		
		
		
		switch($action) {
			case 'calculatePaymentMonthly' : $carLoanCalculate->calculatePaymentMonthly($amount,$period,$floatRated); break;
		}

	}else{
		echo "null";
	}
	
}


?>