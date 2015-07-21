<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>SES - BBAR</title>

    <!-- Bootstrap core CSS -->
    <link href="includes/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

	<?php include('navbar.php'); ?>

    <div class="container">

		<!-- Main component for a primary marketing message or call to action -->
		<!--<div class="jumbotron">
			<h1>First Time User</h1>
			<p>This area will be used for the first time people arrive at this page.</p>
			<p>It presently doesnt work, but will eventually.</p>
			<p>
			  <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
			</p>
		</div>-->
		
		<div class="alert alert-dismissable alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Whoa there!</h4>
			<p>This tool is still being baked so please consider it a beta.  Enjoy!</p>
		</div>
		
		<input type="hidden" id="hiddenMonth"/>
		<input type="hidden" id="hiddenYear"/>
		
		<h2 class="text-left" >SES Enterprise Availability</h2>
		
		<h3 id="monthYearLabel"></h3>
				
		<div class="bs-component">
			<table class="table table-striped table-hover" id="resultTable" data-toggle="table" data-sort-name="inc" data-sort-order="desc">
				<thead>
				</thead>
				<tbody>
				</tbody>
			</table> 
			<div id="spinthingy"></div>
		</div>
	</div> <!-- /container -->

    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="includes/jquery-2.0.3.min.js"></script>
    <script src="includes/bootstrap.min.js"></script>
    <script src="includes/spin.min.js"></script>
    <script src="includes/sesEntAvailability.js"></script>
	<script>
	
		//setup the current month and the inputs for changing months
		var m = new Date();
		var currentMonth = m.getMonth();
		var currentYear = m.getFullYear();
		
	</script>
  </body>
</html>
