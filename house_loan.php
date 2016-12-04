		
		
<script>

	function houseCalculatePayment() {
		  $.ajax({
			   type: "post",
			   url: '../child/HouseLoanCalculate.php',
			   data: { action:'calculatePaymentMonthly',
					   amount : $("#amount").val(),
					   period : $('#period').val(),
					   payback : $('#payback option:selected').val()
					 },
			   
			   success:function(data) {
				if(data != 'error'){				
					 $('#myModal').modal('show');
					 $("#monthlyPay").empty();	
					 $("#monthlyPay").append(data);					 
				}
				else{
					alert('Please Fill in a Form with a value more than zero');
				}
			   }

		  });				  
	}

</script>		


<div class="container">
	<div class="col-md-12">
		<h4 align="center" class="font-white">House</h4>
	</div>

	<div class="col-md-12" style="height:100px;"></div>
	
	<div class= "col-md-4">
		<div class="form-group">
		  <label for="usr" class="font-white">Amount:</label>
		  <input type="text" class="form-control" id="amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
	</div>
	<div class= "col-md-4">
		<div class="form-group">
		  <label for="pwd" class="font-white">Period:</label>
		  <input type="text" class="form-control" id="period" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
	</div>
	<div class= "col-md-4">
		<div class="form-group">
		  <label for="pwd" class="font-white">Payback:</label>
			<select class="selectpicker" id="payback">
			  <option>Monthly</option>
			  <option>Yearly</option>
			</select>
		</div>
	</div>	
	<div class="col-md-4 col-md-offset-4">
		<button type="button" class="btn btn-default" style="width:100%; background:#eee;" onclick="houseCalculatePayment()">Calculate</button>
	</div>
	
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header" align="center" style="background:#444;color:#fff;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="myModalLabel">Payback and Interest</h4>

                </div>
                <div class="modal-body">
					<div id="monthlyPay" align="center"></div>
				</div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
	
</div>


