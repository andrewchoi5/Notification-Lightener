<?php include('db.php');?>
<?php include('thisMonth.php');?>
<?php include('sqls.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<title>Update SLA</title>
	<link href="includes/styles.css" rel="stylesheet">
  <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>    
  <script src="includes/jquery-2.0.3.min.js"></script>
  <script src="includes/bootstrap.min.js"></script>
</head>

<body>
	<?php include('navbar.php');?>
	<div class="container">	
    <?php
    $d = new DateTime('F Y');
    $d->modify('previous month');
    $dp = $d;
    $d = new DateTime('F Y');
    $d->modify('next month');
    $dn = $d;
    $dc = new DateTime("F Y");
    ?>
    <h1 class="text-center">Update Carrier SLA Report Approval</h1>
    <h5 class="text-center">Beta Version!</h5>
    <h3><?php echo $bigTitle[$n] ?>&nbsp;<span class="label label-info">Update Page</span></h3>
    <ul class="pager">
     <li class="previous"><a href="#">&larr; <?php echo $previousMonthTitle ?> </a></li>
     <li class="next "><a href="#"><?php echo $nextMonthTitle ?>&rarr;</a></li>
   </ul>
<p><left>- Dropdown for different users with different authorities</left></p>
    <audio controls="controls" loop="loop">
    <source src="kick.mp3">
    </audio><!-- autoplay="autoplay" -->
   <div align="center">    
    <p> <<------------------------------------------------------------------------ <b>TESTING !!</b> ----------------------------------------------------------------------->> </p>
    <p> <<------------------------------------------------------------------------ <b>TESTING !!</b> ----------------------------------------------------------------------->> </p>
    <p> <<------------------------------------------------------------------------ <b>ONLY FOR QA</b> ----------------------------------------------------------------------->> </p>

    <h3> CSM Approval </h3>
    <div align="right"><p><i>*For this page, you must select all three options for a particular row. </i></p></div>
    <table class="table table-bordered">
      <thead>
        <tr>          
          <th> <center> Resouces </center></th> <!-- width="550px" -->
          <th><center>AP Approval State*</center></th>
          <th ><center>EU Approval State*</center></th>
          <th ><center>NA Approval State*</center></th>
          <th><center> Update </center> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a href="index.php"><center>Relay</center></a></td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color1" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color1" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color2" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color2" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="submitted" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="color3" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="color3" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="submitted" value="Submit" /></form></center></td>
          </tr>  

          <tr>
            <td><a href="index.php#"/><center> BIS-E </center></td>
            <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted2" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color4" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color4" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted2" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color5" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color5" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="submitted2" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="color6" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="color6" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="submitted2" value="Submit" /></form></center></td>
        </tr> 


        <tr>
          <td><a href="index.php#"/> <center>PRV</center> </td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted3" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color7" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color7" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted3" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color8" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color8" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="submitted3" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="color9" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="color9" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="submitted3" value="Submit" /></form></center></td>
        </tr> 


        <tr>
          <td><a href="index.php#"/> <center>BBM </center> </td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted4" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color10" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color10" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted4" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color11" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color11" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="submitted4" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="color12" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="color12" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="submitted4" value="Submit" /></form></center></td>
        </tr> 

        <tr>
          <td><a href="index.php#"/><center> BIS-B </center> </td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted5" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color13" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color13" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="submitted5" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="color14" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="color14" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="submitted5" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="color15" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="color15" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="submitted5" value="Submit" /></form></center></td>
        </tr>
      </tbody>
    </table>
          <?php
          $modifierID = getusername();    
          if(isset($_POST['submitted'])){
            $color1 = $_POST['color1'];
            $color2 = $_POST['color2'];
            $color3 = $_POST['color3'];
            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','1','1','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['submitted2'])){
            $color1 = $_POST['color4'];
            $color2 = $_POST['color5'];
            $color3 = $_POST['color6'];
            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','1','2','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['submitted3'])){
            $color1 = $_POST['color7'];
            $color2 = $_POST['color8'];
            $color3 = $_POST['color9'];
          $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','1','3','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['submitted4'])){
            $color1 = $_POST['color10'];
            $color2 = $_POST['color11'];
            $color3 = $_POST['color12'];

            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','1','4','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['submitted5'])){
            $color1 = $_POST['color13'];
            $color2 = $_POST['color14'];
            $color3 = $_POST['color15'];

            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','1','5','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <br><h3> Service Manager Approval </h3>
    <table class="table table-bordered">
      <thead>
        <tr>          
          <th> <center> Resouces </center></th> <!-- width="550px" -->
          <th><center>AP Approval State*</center></th>
          <th ><center>EU Approval State*</center></th>
          <th ><center>NA Approval State*</center></th>
          <th><center> Update </center> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a href="index.php"><center>Relay</center></a></td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor1" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor1" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor2" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor2" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="smsubmitted" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="smcolor3" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="smcolor3" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="smsubmitted" value="Submit" /></form></center></td>
          </tr>  

          <tr>
            <td><a href="index.php#"/><center> BIS-E </center></td>
            <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted2" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor4" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor4" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted2" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor5" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor5" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="smsubmitted2" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="smcolor6" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="smcolor6" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="smsubmitted2" value="Submit" /></form></center></td>
        </tr> 


        <tr>
          <td><a href="index.php#"/> <center>PRV</center> </td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted3" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor7" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor7" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted3" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor8" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor8" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="smsubmitted3" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="smcolor9" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="smcolor9" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="smsubmitted3" value="Submit" /></form></center></td>
        </tr> 


        <tr>
          <td><a href="index.php#"/> <center>BBM </center> </td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted4" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor10" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor10" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted4" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor11" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor11" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="smsubmitted4" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="smcolor12" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="smcolor12" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="smsubmitted4" value="Submit" /></form></center></td>
        </tr> 

        <tr>
          <td><a href="index.php#"/><center> BIS-B </center> </td>
          <td>   
           <center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted5" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor13" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor13" value="0" id="red"> Negative
              </label>   
            </div></center> 
          </td>
          <td><center><form name="myform" method="post" action="updatesla.php">
            <input type="hidden" name="smsubmitted5" value="false" />
            <div class="btn-group btn-group-sm" data-toggle="buttons">
              <label class="btn btn-success">
                <input type="radio" name="smcolor14" value="1" id="green"> Positive
              </label>          
              <label class="btn btn-danger">
                <input type="radio" name="smcolor14" value="0" id="red"> Negative
              </label>   
            </div></center></td>
            <td>
              <center><form name="myform" method="post" action="updatesla.php">
                <input type="hidden" name="smsubmitted5" value="false" />
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="smcolor15" value="1" id="green"> Positive
                  </label>          
                  <label class="btn btn-danger">
                    <input type="radio" name="smcolor15" value="0" id="red"> Negative
                  </label>   
                </div></center>
              </td>
              <td><center><input class="btn btn-info btn-sm" type="submit" name="smsubmitted5" value="Submit" /></form></center></td>
        </tr>
      </tbody>
    </table>
          <?php
            if(isset($_POST['smsubmitted'])){
            $color1 = $_POST['smcolor1'];
            $color2 = $_POST['smcolor2'];
            $color3 = $_POST['smcolor3'];
            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','2','1','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['smsubmitted2'])){
            $color1 = $_POST['smcolor4'];
            $color2 = $_POST['smcolor5'];
            $color3 = $_POST['smcolor6'];
            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','2','2','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['smsubmitted3'])){
            $color1 = $_POST['smcolor7'];
            $color2 = $_POST['smcolor8'];
            $color3 = $_POST['smcolor9'];

            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','2','3','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['smsubmitted4'])){
            $color1 = $_POST['smcolor10'];
            $color2 = $_POST['smcolor11'];
            $color3 = $_POST['smcolor12'];

            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','2','4','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          if(isset($_POST['smsubmitted5'])){
            $color1 = $_POST['smcolor13'];
            $color2 = $_POST['smcolor14'];
            $color3 = $_POST['smcolor15'];

            $sql = "INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
            VALUES ('$color1', '$color2', '$color3','$monthIndex','$yearIndex','2','5','$modifierID', GETDATE())";
            if(!mssql_query($sql)){
              die('error inserting new record');
            }
            else{
              echo '<br>';
              echo "1 sample record has been added to the database.";
            }
          } 
          ?>
          <?php
          // $sql = "SELECT*FROM[locutus].[dbo].[approval]";
          // $query = mssql_query($sql);
          // while ($row = mssql_fetch_array($query)){
          //   echo "<br> id: ". $row["ID"]. " - Name: ". $row["modifierID"]. " " ."Date modified: ". $row["dateAdded"] . "<br>";
          // }
          ?>  
        </br><br><p> <<-------------------------------------------------- testing ------------------------------------------------->> </p>
     <form method="post" action="updatesla.php">
      <input type="hidden" name="submittedExample" value="false" />
      <fieldset>
        <legend><i> Name Test</i></legend>
        <label> First Name:  <input type="text" name="fname" /></label>
        <label> &nbsp; Last Name: <input type="text" name="lname" /></label>
      </fieldset>
      <br/>
      <input type="submit" value="Approve" />
    </form> <!-- make it editable -->
    <?php
    if(isset($_POST['submittedExample'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $sql = "INSERT INTO [locutus].[dbo].[testing] ([firstname], [lastname]) VALUES ('$fname', '$lname')";
      if(!mssql_query($sql)){
        die('error inserting new record');
      }else{
        echo '<br>';
        echo "1 sample record has been added to the database.";
      }
    } 
    ?>
    <br>
  </div> <!-- end of align center -->
</div>
<div align="center">
  <?php
  $sql = "SELECT * FROM [locutus].[dbo].[testing]";
  $query = mssql_query($sql);
  while ($row = mssql_fetch_array($query)){
    echo '<h3>' . $row["firstname"] . " " . $row["lastname"]."&nbsp;"."<a href='delete.php?del=$row[peopleid]'>Delete</a>"."</h3>";
  }
  ?>
</div>
</div>
</body>
<script>
$('#basicModal').on('hidden.bs.modal', function (e){
})
$('#basicModal').on('show.bs.modal', function (e){
})
$('a').bind('click',function(){
	var url = ($(this).attr('href'));
	var svc = getURLParameter(url, 'svc');
	var reg = getURLParameter(url, 'reg');
 var finalLabel = "Approve " + svc + " in " + reg;
 $('#svcid').val(svc);
 $('#regid').val(reg);
 $('#modalLabel').html(finalLabel);
});
function getURLParameter(url, name){
  return (RegExp(name + '=' + '(.+?)(&|$)').exec(url) || [,null])[1];
}
</script>
</html>