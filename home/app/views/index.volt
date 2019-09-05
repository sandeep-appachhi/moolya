<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


        <link rel="stylesheet" href="{{ publicDir }}css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="{{ publicDir }}css/custom.css">
        <link rel="stylesheet" href="{{ publicDir }}fonts/poppins.css">

        <script type="text/javascript" src="{{ publicDir }}js/custom.js"></script>
        <script type="text/javascript" src="{{ publicDir }}js/material.min.js"></script>
        <script src="{{ publicDir }}js/jquery/jquery.min.js"></script>
        <script src="{{ publicDir }}js/bootstrap/bootstrap.min.js"></script>

	<!-- Meta -->
	{{ getTitle() }}
</head>
<body>
	
		{% include 'shared/header.volt' %}
			<!-- Load the content first -->
			{{ content() }}
			<!-- Load the comman files or shared files after the content is loaded -->
        {% include 'shared/footer.volt' %}

</body>
</html>
