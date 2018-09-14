@include('head')
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="home">Job Manager</a>
		</div>
		<
		<ul class="nav navbar-nav">
			<li>
				<a href="home">Jobs</a>
			</li>
			<li class="active">
				<a href="customer-table">Customers</a>
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
	<button type="button" class="btn btn-warning btn-add-new" data-toggle="modal" data-target="#newCustomerModal">Add New Customer</button>
	<div class="modal fade" id="newCustomerModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Add New Customer</h4>
				</div>
				<div class="modal-body">
					<form id="newCustomerForm" method="POST" action="api/create_customer">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label for="cCustName">Name:</label>
							<input type="text" class="form-control" name="cCustName" id="cCustName">
						</div>
						<div class="form-group">
							<label for="cCustEmail">Email:</label>
							<input type="text" class="form-control" name="cCustEmail" id="cCustEmail">
						</div>
						<div class="form-group">
							<label for="cCustPhone">Phone Number:</label>
							<input type="text" class="form-control" name="cCustPhone" id="cCustPhone">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default" id="submitNewCustomer">Submit</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="editCustomerModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="editCHeader"></h4>
				</div>
				<div class="modal-body">
					<form id="editCustomerForm">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label for="cCustNameEdit">Name:</label>
							<input type="text" class="form-control" name="cCustNameEdit" id="cCustNameEdit">
						</div>
						<div class="form-group">
							<label for="cCustEmailEdit">Email:</label>
							<input type="text" class="form-control" id="cCustEmailEdit" name="cCustEmailEdit">
						</div>
						<div class="form-group">
							<label for="cCustPhoneEdit">Phone Number:</label>
							<input type="text" class="form-control" id="cCustPhoneEdit" name="cCustPhoneEdit">
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

	<table id="customerTable" class="display" style='width:100%'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody id="customerTableBody">
			
		</tbody>
	</table>
</div>
@include('foot')
