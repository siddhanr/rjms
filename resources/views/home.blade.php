@include('head')
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="home">Job Manager</a>
		</div>
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
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="auth/logout">Logout</a>
			</li>
		</ul>
	</div>
</nav>
@include('foot')