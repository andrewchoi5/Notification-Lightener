
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>BBAR</title>
    <link href="includes/styles.css" rel="stylesheet">
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
			<p>This tool is still being baked so please consider it a beta.</p>
		</div>		
		<h2 class="text-center" >GMpS Incident Lookup</h2>		
		<form class="form-horizontal" role="form">
		  <div class="form-group">
			<label for="incdata" class="col-sm-2 control-label">INC (comma separated)</label>
			<div class="col-sm-10">
			  <textarea class="form-control" id="incdata" name="incdata" rows="3"></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" formmethod="post" formaction="lookup.php" class="btn btn-default">Lookup</button>
			</div>
		  </div>
		</form>				
		<div class="bs-component">
			<table class="table table-striped table-hover" data-toggle="table" data-sort-name="inc" data-sort-order="desc">			
			<?php			
				if (isset($_POST['incdata'])){				
					echo '<thead>
					  <tr>
						<th data-field="inc">INC</th>
						<th data-field="bbm" class="align-center">GMpS</br>(BBM)</th>
						<th data-field="enterprise" class="align-center">GMpS</br>(Enterprise)</th>
						<th data-field="handheld" class="align-center">GMpS</br>(Devices)</th>
						<th data-field="total" class="align-center">GMpS</br>(Total)</th>
					  </tr>
					</thead>
					<tbody>';
				
					$database_connection = mssql_connect('SQL51YKF\HA6', 'ebcmipq', 'oA>97&mY$L5y6nH\'w}4B|2Rf0');
					//$database_connection = mssql_connect('SQL51YKF\HA6', 'bjackson', '');
					mssql_select_db("greenstate", $database_connection);
					$string = $_POST['incdata'];					
					$array = explode(',', $string); //split string into array seperated by ', '					
					$array = array_unique($array);  //ensure there's only unique values					
					foreach($array as $value) //loop over values
					{
						echo '<tr>';
						$value = trim($value);
						$value = strtoupper($value);
						$stmt="USE greenstate;
							SELECT * FROM [greenstate].[bbar].[gmps]
							WHERE [greenstate].[bbar].[gmps].[event] = '".$value."' ORDER BY [greenstate].[bbar].[gmps].[serviceid] ASC";
						$result = mssql_query($stmt);						
						echo '<td><a href="http://ciokmp001cnc/greenstate/index.html?ticket='.$value.'" target="_blank">'.$value.'</a></td>';						
						$BBMgmps = 0;
						$ENTgmps = 0;
						$HHgmps = 0;						
						while($row = mssql_fetch_array($result)) {
							if ($row[1] == 1){
								$BBMgmps = $row[2];
							}
							if ($row[1] == 2){
								$ENTgmps = $row[2];
							}
							if ($row[1] == 3){
								$HHgmps = $row[2];
							}
						}						
						echo '<td class="align-right">'.round($BBMgmps, 2).'</td>';
						echo '<td class="align-right">'.round($ENTgmps, 2).'</td>';
						echo '<td class="align-right">'.round($HHgmps, 2).'</td>';						
						//do we want it weighted?
						//$totalgmps = ($BBMgmps * 0.4) + ($ENTgmps * 0.4) + ($HHgmps * 0.2);						
						//probably not
						$totalgmps = $BBMgmps + $ENTgmps + $HHgmps;
						echo '<td class="align-right">'.round($totalgmps, 2).'</td>';						
						echo '</tr>';
					}
					echo '</tbody>';
				}			
			?>                
			</table> 
		</div><!-- /example -->
	</div> <!-- /container -->
    <script src="includes/jquery-2.0.3.min.js"></script>
    <script src="includes/bootstrap.min.js"></script>
	<script>
		$('#basicModal').on('hidden.bs.modal', function (e) {
			//var value = $('#nameid').val();
			//alert(value);
		})
		$('#basicModal').on('show.bs.modal', function (e) {
		})
		$('a').bind('click',function(){
			var url = ($(this).attr('href'));
			var svc = getURLParameter(url, 'svc');
			var reg = getURLParameter(url, 'reg');
			//alert(url);
			//alert('svc: ' + svc + ' reg: ' + reg);
			var finalLabel = "Approve " + svc + " in " + reg;
			$('#svcid').val(svc);
			$('#regid').val(reg);
			$('#modalLabel').html(finalLabel);
		});
		function getURLParameter(url, name) {
			return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
		}
	</script>
  </body>
</html>
