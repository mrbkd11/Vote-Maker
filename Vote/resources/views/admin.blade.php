<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{ asset('admin.css') }}">


</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<div class="bx">
				<img src="{{ asset('SJE_black.png') }}" alt="" width="50px">
			</div>
			<span class="text">Sup'com Junior</span>

		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-history'></i>
					<span class="text">Historique</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-edit-alt'></i>
					<span class="text">Create</span>
				</a>
			</li>


		</ul>
		<ul class="side-menu bottom">
			<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<form action="#">
				<!-- <div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div> -->
			</form>

		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>

				</div>

			</div>

			<ul class="box-info">
				<li>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero itaque dolores voluptate,
						voluptatibus reiciendis exercitationem sunt necessitatibus </p>
				</li>
				<li>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero itaque dolores voluptate,
						voluptatibus reiciendis exercitationem sunt necessitatibus </p>
				</li>
				<li>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero itaque dolores voluptate,
						voluptatibus reiciendis exercitationem sunt necessitatibus </p>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">

					<table>
						<thead>
							<tr>
								<th>VOTE</th>
								<th>Date </th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>lroem</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">lorem</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>lorem</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">lorem</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>lorem</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">lorem</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>lorem</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">lorem</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>lorem</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">lorem</span></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="{{ asset('admin.js') }}"></script>
</body>

</html>