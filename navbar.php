
<style>
	/* Initial styles for the dropdown */
	.dropdown-content {
		display: none; /* Hide the dropdown content by default */
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

	/* Styles for the dropdown items */
	.dropdown-content a {
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	/* Change the color of dropdown items on hover */
	.dropdown-content a:hover {
		background-color: #ddd;
	}

	/* Show the dropdown content when the parent is hovered */
	.nav-item.dropdown:hover .dropdown-content {
		display: block;
	}
</style>
<nav id="sidebar" class='mx-lt-5 bg-warning' >

		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=loans" class="nav-item nav-loans"><span class='icon-field'><i class="fa fa-file-invoice-dollar"></i></span> Loans</a>
				<a href="index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-money-bill"></i></span> Payments</a>
				<div class="nav-item dropdown"> <!-- Wrap "Monthly Contributions" in a div with "dropdown" class -->
					<a href="#" class="nav-link">
						<span class='icon-field'><i class="fa fa-money-bill"></i></span> Monthly Contributions <i class="fa fa-caret-down"></i>
					</a>
					<div class="dropdown-content"> <!-- Create the dropdown content -->
						<!-- Add dropdown items here -->
						<a href="index.php?page=track">Track</a>
						<a href="index.php?page=monthly_contributions">Monthly payments</a>
					</div>
				</div>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=borrowers" class="nav-item nav-borrowers"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Borrowers</a>
				<a href="index.php?page=plan" class="nav-item nav-plan"><span class='icon-field'><i class="fa fa-list-alt"></i></span> Loan Plans</a>
				<a href="index.php?page=loan_type" class="nav-item nav-loan_type"><span class='icon-field'><i class="fa fa-th-list"></i></span> Loan Types</a>

				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>

			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
