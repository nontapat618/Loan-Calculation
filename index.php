<html>
	<head>
		<title>Calculate Loan Cost</title>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
		<script src="../js/bootstrap.js"></script>
		<script>		
			$( document ).ready(function() {
				replaceContent('house_loan.php');
			});
		
			function replaceContent(loanType) {
			   $.ajax({

				 type: "GET",
				 url: loanType,
				 success: function(data) {
					  $('#loan').html(data);
				 }

			   });	  
			}		
		</script>	
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
	
	</head>	
	<body style="background:linear-gradient(rgba(0, 0, 0, 0.50), rgba(0, 0, 0, 0.50)),url('images/back.jpg');background-repeat: no-repeat;background-position: center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;">			
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Loan</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li><a onclick="replaceContent('house_loan.php')">House <span class="sr-only">(current)</span></a></li>
				<li><a onclick="replaceContent('car_loan.php')">Car</a></li>			
			  </ul>

			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="row">
				<div class= "col-md-12" style="height:100px;"></div>
				<div class="col-md-12" style="margin:0 auto; padding-right:1px;"">
					<div id="loan" class="cal-background" style="height:80%;"></div>			
				</div>
				<div class= "col-md-12" style="height:100px;"></div>
				<div class= "col-md-12" style="height:100px;"></div>
		</div>


		
		

	</body>
</html>
