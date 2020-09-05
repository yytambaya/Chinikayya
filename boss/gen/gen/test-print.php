<html>

<head>

<script>
function CallPrint(strid) {
    var prtContent = document.getElementById(strid);
    var WinPrint = window.open('', '', 'letf=0,top=0,width=1,height=1,
                    toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
    prtContent.innerHTML = strOldOne;
}

</script>

</head>

<body>
	
	<div id="page">
			<a href="" return false">Print now</a>
			<table class="table table-responsive-sm table-info table-bordered">
				<th>Customer Order Receipt</th>
				<tr><td><small>Product Name: Amazing Book</small></td></tr>
				<tr><td><small>Customer ID: 3</small></td></tr>
				<tr><td><small>Product ID : 25</small></td></tr>
				<tr><td><small><b>Transaction ID</b> : 46537hr547d89hpi7</small></td></tr>
				
				<tfoot>
					<tr><td><small>Total Amount: $40<small></td></tr>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-group">
						<input type="hidden" name="customer_id" value=""/>
						<input type="hidden" name=""/>
						
						<tr><td><button type="" name="confirm_order" class="btn form-control bg-light" onclick="window.print() return false">Print</button></td></tr>
					</form>
				</tfoot>
			</table>
	</div>

</body>