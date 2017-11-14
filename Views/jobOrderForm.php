<?php 

include "../Function/function.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form action="<?php $_PHP_SELF ?>" method="POST">

			<div>
			<label>Job Order No.</label>
			<input type="number" name="jobNum" placeholder="" required>
			</div>

			<div>
			<label>Customer Name</label>
			<input type="text" name="custName" placeholder="" required>
			</div>

		<div>
			<label>Contact No. (+63)</label>
			<input type="text"  name="custContact" placeholder="9304583977" minlength="9"required>
			</div>

			<div>
			<label>Customer Address</label>
			<input type="text" name="custAdd" placeholder="" required>
			</div>

			<div>
			<label>Date Recieved</label>
			<input type="date" name="dateRec" placeholder="" required>
			</div>

			<div>
			<label>Item Code</label>
			<input type="text" name="itmCode" placeholder="" required>
			</div>

			<div>
			<label>Item / Product</label>
			<input type="text" name="itmName" placeholder="" required>
			</div>

			<div>
			<label>Brand</label>
			<input type="text" name="itmBrand" placeholder="" required>
			</div>

			<div>
			<label>Model</label>
			<input type="text" name="itmModel" placeholder="" required>
			</div>

			<div>
			<label>Serial No.</label>
			<input type="text" name="serialNum" placeholder="" required>
			</div>

			<div>
			<label>Quantity</label>
			<input type="number" name="itemQty" placeholder="" required>
			</div>

			<div>
			<label>Date Purchase</label>
			<input type="date" name="datePur" placeholder="" required>
			</div>

			<div>
			<label>Accesories</label>
			<input type="text" name="accesories" placeholder="" required>
			</div>

			<div>
			<label>Problem</label>
			<input type="text" name="problem" placeholder="" required>
			</div>

			<div>
			<label>Remarks</label>
			<input type="text" name="remarks" placeholder="" required>
			</div>

			<div>
			<label>Service By</label>
			<input type="text" name="servBy" placeholder="" required>
			</div>

			<div>
			<label>Address</label>
			<input type="text" name="suppAddress" placeholder="" required>
			</div>

			<div>
			<label>Contact No. (+63)</label>
			<input type="text"  name="suppContact" placeholder="9999999999" minlength="6" required>
			</div>

			<div>
			<label>Waybill</label>
			<input type="text" name="wayBill" placeholder="" required>
			</div>

			<div>
			<label>Status</label>
			
			<select>
				<option name="itmStatus" value="inOffice">In Office</option>
				<option name="itmStatus" value="withSupplier">With Supplier</option>
				<option name="itmStatus" value="onTheWay">On The Way</option>
				<option name="itmStatus" value="repaired">Repaired</option>
				<option name="itmStatus" value="replace">Replace</option>
				<option name="itmStatus" value="advReplace">Advance Replace</option>
			</select>
			</div>
			
			<div>
			
			<input type="submit" name="jobOSubmit" value="jobOSubmit">
			</div>

</form>

            

</body>
</html>