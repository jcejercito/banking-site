<div class="container mt-5">
	<h2>New Transaction</h2>
	<form class="mt-5" action="backend/submittransaction.php" method="POST">
		<div class="mb-3">
			<label class="form-label">Email address</label>
			<select name="transactionType" class="form-select mb-3" aria-label="Default select example" required>
				<option selected>Select a transaction type...</option>
				<option value="2">DEPOSIT</option>
				<option value="1">WITHDRAW</option>
			</select>
		</div>

		<div class="mb-3">
			<label class="form-label">Amount</label>
			<input name="amount" step=".01" type="number" class="form-control" placeholder="Enter desired amount..." min="1" required>
		</div>

		<div class="mb-3">
			<button type="submit" class="btn btn-primary mb-3">Submit Transaction</button>
		</div>
	</form>
</div>