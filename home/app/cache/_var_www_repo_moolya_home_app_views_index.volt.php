<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


        <link rel="stylesheet" href="<?= $publicDir ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $publicDir ?>css/custom.css">
        <link rel="stylesheet" href="<?= $publicDir ?>fonts/poppins.css">
        <link rel="stylesheet" href="<?= $publicDir ?>js/slick/slick.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="text/javascript" src="<?= $publicDir ?>js/custom.js"></script>
        <script type="text/javascript" src="<?= $publicDir ?>js/material.min.js"></script>
        <script src="<?= $publicDir ?>js/jquery/jquery.min.js"></script>
        <script src="<?= $publicDir ?>js/bootstrap/bootstrap.min.js"></script>
        <script src="<?= $publicDir ?>js/slick/slick.min.js"></script>
	<!-- Meta -->
	<?= $this->tag->gettitle() ?>
</head>
<body>
	
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

			<!-- Load the content first -->
			<?= $this->getContent() ?>
			<!-- Load the comman files or shared files after the content is loaded -->
        <footer class="sticky-footer ">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <!-- <span>Copyright &copy; moolya.com</span> -->
      </div>
    </div>
</footer>

</body>
</html>
