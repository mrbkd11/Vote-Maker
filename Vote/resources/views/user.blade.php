 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<div class="bx">
				<img src="img/SJE_black.png" alt="" width="50px">
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
					<h1>Users</h1>

				</div>

			</div>
<div>
    <form method="GET">
        <div class="search">
    <input type="search" class="search__input" placeholder="Search" name="search" id="search" >
    <button class="search__button" name="search">
        <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
            <g>
                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
            </g>
        </svg>
    </button>
</div>

    </form>
</div>
			


			<div class="table-data">
				<div class="order">

					<table>
						<thead>
							<tr>
								<th>NAME</th>
								<th>E_MAIL </th>
								<th>CREATED_AT</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($users as $user)
							<tr>
								<td>
									<p>{{$user->name}}</p>
								</td>
								<td>{{$user->email}}</td>
								<td><span class="status completed">{{$user->created_at}}</span></td>
							</tr>
							@endforeach
						</tbody>
					</table>
                    
				</div>

			</div>
             
<div style="width: 100%">
                    <div id="page" style="margin-left: 30vw;width:10vw; background-color:white" >  {{$users->links()}}  </div></div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

                       
                    
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<script src="{{ asset('js/admin.js') }}"></script>
	<script type=""
</body>

</html>
    