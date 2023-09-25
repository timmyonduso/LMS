<!--<div class="col-md-6">-->
<!--	<label class="control-label">New Borrower</label>-->
<!--	--><?php
//	$borrower = $conn->query("SELECT *,concat(surname,', ',first_name,' ',middle_name) as name FROM users order by concat(surname,', ',first_name,' ',middle_name) asc ");
//	?>
<!--	<select name="borrower_id" id="borrower_id" class="custom-select browser-default select2">-->
<!--		<option value=""></option>-->
<!--		--><?php //while($row = $borrower->fetch_assoc()): ?>
<!--			<option value="--><?php //echo $row['id'] ?><!--" --><?php //echo isset($borrower_id) && $borrower_id == $row['id'] ? "selected" : '' ?><?php //echo $row['name'] ?><!--</option>-->
<!--		--><?php //endwhile; ?>
<!--	</select>-->
<!--</div>-->

<?php include 'db_connect.php' ?>
<?php 

if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM borrowers where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}
$loan = $conn->query("SELECT *,concat(surname,', ',first_name,' ',middle_name) as name FROM users order by concat(surname,', ',first_name,' ',middle_name) asc ");
foreach($loan->fetch_array() as $k => $v){
	$meta[$k] = $v;
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-borrower">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="form-group">
					<label for="" class="control-label">Member ID</label>
					<?php
						$loan = $conn->query("SELECT *,concat(surname,', ',first_name,' ',middle_name) as name FROM users order by concat(surname,', ',first_name,' ',middle_name) asc ");
					?>
					<select name="loan_id" id="loan_id" class="custom-select browser-default select2">
						<option value=""></option>
						<?php
						while($row=$loan->fetch_assoc()):?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($borrower_id) && $borrower_id == $row['id'] ? "selected" : '' ?>><?php echo $row['id'] ?></option>
						<?php endwhile; ?>
					</select>
				</div>
			</div>

			<div class="bfields">

			</div>
		</form>
	</div>
</div>

<script>
	 $('#manage-borrower').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_borrower',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp === 1){
	 				alert_toast("Borrower data successfully saved.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
				else {
					alert_toast("Borrower data could not be saved.", "danger"); // Display in red for an error message
				}
	 		}
	 	})
	 })

	 $('[name="loan_id"]').change(function(){
		 load_fields()
	 })
	 $('.select2').select2({
		 placeholder:"Please select here",
		 width:"100%"
	 })

	 function load_fields(){
		 start_load()
		 $.ajax({
			 url:'borrower_fields.php',
			 method:"POST",
			 data:{id:'<?php echo isset($id) ? $id : "" ?>',loan_id:$('[name="loan_id"]').val()},
			 success:function(resp){
				 if(resp){
					 $('#fields').html(resp)
					 end_load()
				 }
			 }
		 })
	 }
	 $(document).ready(function(){
		 if('<?php echo isset($_GET['id']) ?>' == 1)
			 load_fields()
	 })
</script>