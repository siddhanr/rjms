@include('head')
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="home">Job Manager</a>
		</div>
		<
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="home">Jobs</a>
			</li>
			<li>
				<a href="customer-page">Customers</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="auth/logout">Logout</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container table-container">
	<button type="button" class="btn btn-warning btn-add-new" data-toggle="modal" data-target="#newJobModal">Add New Job</button>

	<!-- add new form table -->
	<div class="modal fade" id="newJobModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Add New Job</h4>
				</div>
				<div class="modal-body">
					<form id="addNewJobForm" method="POST" action="api/create_job">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="row">
							<div class="col-sm-6">
								<h4>Customer</h4>
								<div class="form-group">
									<label for="custName">Name: </label>
									<input type="text" list="customer_list" class="form-control" name="custName" id="custName">
									<datalist id="customer_list">

									</datalist>
								</div>
								<div class="form-group">
									<label for="custEmail">Email: </label>
									<input type="text" class="form-control" name="custEmail" id="custEmail">
								</div>
								<div class="form-group">
									<label for="custPhone">Phone Number:</label>
									<input type="text" class="form-control" name="custPhone" id="custPhone">
								</div>
							</div>
							<div class="col-sm-6">
								<h4>Address</h4>
								<div class="form-group">
									<label for="jobSuburb">Area: </label>
									<input list="suburb_list" type="text" class="form-control" name="jobSuburb" id="jobSuburb">
									<datalist id="suburb_list">

									</datalist>
								</div>
								<div class="form-group">
									<label for="jobAddress">Address: </label>
									<input type="text" class="form-control" name="jobAddress" id="jobAddress" list="address_list">
									<datalist id="address_list">

									</datalist>
								</div>
							</div>
						</div>
						<hr>
						<h4>Job Details</h4>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="jobStatus">Status: </label>
									<select class="form-control" name="jobStatus" id="jobStatus">
										<option>REQUEST</option>
										<option>QUOTE TO SEND</option>
										<option>PENDING QUOTE</option>
										<option>DEPOSIT</option>
										<option>INVOICED</option>
										<option>PAID</option>
										<option>FOLLOW UP</option>
										<option>ARCHIVED</option>
									</select>
								</div>
								<div class="form-group">
									<label for="roofType">Roof Type: </label>
									<input type="text" class="form-control" name="roofType" id="roofType">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="jobType">Job Type: </label>
									<select class="form-control" name="jobType" id="jobType">
										<option>R.REPAIR</option>
										<option>R.RESTORATION</option>
										<option>R.ASSESMENT</option>
										<option>G.REPAIR</option>
										<option>G.REPLACEMENT</option>
										<option>H.WASH</option>
										<option>EXTERIOR P.</option>
										<option>INTERIOR P.</option>
									</select>
								</div>
								<div class="form-group">
									<label for="jobArea">Job Area: </label>
									<input type="text" class="form-control" name="jobArea" id="jobArea">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jobPrice">Price: </label>
							<input type="text" class="form-control" name="jobPrice" id="jobPrice">
						</div>
						<div class="form-group">
							<label for="jobDescription">Description/Notes</label>
							<textarea class="form-control" rows="4" name="jobDescription" id="jobDescription"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default" id="submitNewJob">Submit</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Main job table --> 
	<table id="mainJobTable" class="display" style='width:100%'>
		<thead>
			<tr>
				<th>ID</th>
				<th>Status</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Area</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody id="jobTableBody">
			
		</tbody>
	</table>

	<div class="modal fade" id="editJobModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="editHeader"></h4>
				</div>
				<div class="modal-body">
					<form id="editJobForm">
						<div class="row">
							<div class="col-sm-6">
								<h4>Customer</h4>
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								<input type="hidden" name="jobId" id="jobId">
								<div class="form-group">
									<label for="custNameEdit">Name: </label>
									<input type="text" class="form-control" name="custNameEdit" id="custNameEdit">
								</div>
								<div class="form-group">
									<label for="custEmailEdit">Email: </label>
									<input type="text" class="form-control" name="custEmailEdit" id="custEmailEdit">
								</div>
								<div class="form-group">
									<label for="custPhoneEdit">Phone Number:</label>
									<input type="text" class="form-control" name="custPhoneEdit" id="custPhoneEdit">
								</div>
							</div>
							<div class="col-sm-6">
								<h4>Address</h4>
								<div class="form-group">
									<label for="jobSuburbEdit">Area: </label>
									<input type="text" class="form-control" name="jobSuburbEdit" id="jobSuburbEdit">
								</div>
								<div class="form-group">
									<label for="jobAddressEdit">Address: </label>
									<input type="text" class="form-control" name="jobAddressEdit" id="jobAddressEdit">
								</div>
							</div>
						</div>
						<hr>
						<h4>Job Details</h4>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="jobStatusEdit">Status: </label>
									<select class="form-control" name="jobStatusEdit" id="jobStatusEdit">
										<option>REQUEST</option>
										<option>QUOTE TO SEND</option>
										<option>PENDING QUOTE</option>
										<option>DEPOSIT</option>
										<option>INVOICED</option>
										<option>PAID</option>
										<option>FOLLOW UP</option>
										<option>ARCHIVED</option>
									</select>
								</div>
								<div class="form-group">
									<label for="roofTypeEdit">Roof Type: </label>
									<input type="text" class="form-control" name="roofTypeEdit" id="roofTypeEdit">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="jobTypeEdit">Job Type: </label>
									<select class="form-control" name="jobTypeEdit">
										<option>R.REPAIR</option>
										<option>R.RESTORATION</option>
										<option>R.ASSESMENT</option>
										<option>G.REPAIR</option>
										<option>G.REPLACEMENT</option>
										<option>H.WASH</option>
										<option>EXTERIOR P.</option>
										<option>INTERIOR P.</option>
									</select>
								</div>
								<div class="form-group">
									<label for="jobAreaEdit">Job Area: </label>
									<input type="text" class="form-control" name="jobAreaEdit" id="jobAreaEdit">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jobPriceEdit">Price: </label>
							<input type="text" class="form-control" name="jobPriceEdit" id="jobPriceEdit">
						</div>
						<div class="form-group">
							<label for="jobDescriptionEdit">Description/Notes</label>
							<textarea class="form-control" rows="4" name="jobDescriptionEdit" id="jobDescriptionEdit"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('foot')