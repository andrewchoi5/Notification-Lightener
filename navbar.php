    <?php include_once('user.php'); ?>	
	<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BBAR</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Approval <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="approve.php">Carrier Approval</a></li>
                <li class="divider"></li>
               <li><a href="admin.php">Administator Page</a></li>
              </ul>

            </li>  


            

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporting <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">BBAR Report Client</a></li>
                <li><a href="http://ciokmp001cnc:8080/bbar/client/" target="_blank">BBAR Advanced Client</a></li>
				        <li><a href="http://go/bbaradmin" target="_blank">BBAR Admin Client</a></li>
                <li class="divider"></li>
	              <li><a href="lookup.php">GMpS Lookup</a></li>
                <li class="divider"></li>
				        <li><a href="https://wikis.rim.net/display/BBServiceGovernance/Availability+Reporting+Calendar" target="_blank">Calendar</a></li>
             
              </ul>

            </li>     
            </li>
          </ul>

		  <ul class="nav navbar-nav navbar-right">
        
			<li><a href="#"><?php echo getusername(); ?></a></li>
		  </ul>
          <!--<ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top</a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>