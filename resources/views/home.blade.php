@include('head')
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="home">Job Manager</a>
		</div>
		<!--
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="home">Jobs</a>
			</li>
			<li>
				<a href="customer">Customers</a>
			</li>
			<li>
				<a href="address">Addresses</a>
			</li>
		</ul>
		-->
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
					<form action="#">
						<div class="row">
							<div class="col-sm-6">
								<h4>Customer</h4>
								<div class="form-group">
									<label for="custName">Name: </label>
									<input type="text" class="form-control" id="custName">
								</div>
								<div class="form-group">
									<label for="custEmail">Email: </label>
									<input type="text" class="form-control" id="custEmail">
								</div>
								<div class="form-group">
									<label for="custPhone">Phone Number:</label>
									<input type="text" class="form-control" id="custPhone">
								</div>
							</div>
							<div class="col-sm-6">
								<h4>Address</h4>
								<div class="form-group">
									<label for="jobSuburb">Area: </label>
									<input type="text" class="form-control" id="jobSuburb">
								</div>
								<div class="form-group">
									<label for="jobAddress">Address: </label>
									<input type="text" class="form-control" id="jobAddress">
								</div>
							</div>
						</div>
						<hr>
						<h4>Job Details</h4>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="jobStatus">Status: </label>
									<select class="form-control" id="jobStatus">
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
									<input type="text" class="form-control" id="roofType">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="jobType">Job Type: </label>
									<select class="form-control" id="jobType">
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
									<input type="text" class="form-control" id="jobArea">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jobPrice">Price: </label>
							<input type="text" class="form-control" id="jobPrice">
						</div>
						<div class="form-group">
							<label for="jobDescription">Description/Notes</label>
							<textarea class="form-control" rows="4" id="jobDescription"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
					<h4 class="editHeader"></h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>
@include('foot')