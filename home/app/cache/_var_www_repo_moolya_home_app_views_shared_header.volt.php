<nav class="navbar navbar-expand-lg topbar-main">
	<a class="navbar-brand" href="<?= $baseUrl ?>"><img class="navbar-brand moolya-logo" src="<?= $publicDir ?>img/moolya-logo.png">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse justify-content-end main-topbar" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#">HOME </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">SOLUTION</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  		PRODUCTS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Appachhi</a>
					<a class="dropdown-item" href="#">AppStore</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">LEARNING</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">CAREER</a>
			</li>
		</ul>
	</div>
</nav>
<script type="text/javascript">
	$(document).ready(function () {
		$('.main-topbar .navbar-nav li').click(function(){
			$('.main-topbar .navbar-nav li').removeClass('active');
			$(this).addClass('active');
		})
	});
</script>
