<?php
session_start();
if(!isset($_SESSION['user_session'])){
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <!--Bootstrap required Meta-Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LiverWeb - Dashboard</title>

    <!--Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <!--Java-Script-Dateien -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/searchPatient.js"></script>
  </head>
  <body>

	<!--Daten einlesen-->
	<?php
	include_once("db_connect.php");
	$sql = "SELECT nachname FROM benutzer WHERE benutzer_id='".$_SESSION['user_session']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$drNachname = mysqli_fetch_assoc($resultset);
	?>


  <!--Main Navigation Bar-->
  <nav class="navbar navbar-inverse navbar-fixes-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">LiverWeb</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="indexV.php">Patient</a></li>
        <li><a href="#">Kohorte</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dr. <?php echo $drNachname['nachname'] ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Log-Out</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Einstellung 1</a></li>
            <li><a href="#">Einstellung 2</a></li>
            <li><a href="#">Einstellung 3</a></li>
          </ul>
        </li>
      <a href="#"><img src="pictures/UK-Erlangen-Logo.jpg" alt="UK-Erlangen" style="height:40pt "></a>
      </ul>
    </div>
  </nav>

  <!--Inline Form to search for or add Patients. action="searchPatients.php" method="post"-->
  <form class="form-inline" >
    <div class="form-group">
      <label for="nachname">Nachname:</label>
      <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
    </div>
    <div class="form-group">
      <label for="vorname">Vorname:</label>
      <input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname">
    </div>
    <div class="form-group">
      <label for="geburtsdatum">Geburtsdatum:</label>
      <input type="date" class="form-control" id="geburtsdatum" name="geburtsdatum" min="1900-01-01" placeholder="Geburtsdatum">
    </div>
    <div class="form-group">
      <label for="berichtDatum">Vorstellungsdatum:</label>
      <input type="date" class="form-control" id="berichtDatum" name="berichtDatum" placeholder="Vorstellungsdatum">
    </div>
    <button id="patsuchsubmit" type="button" onclick="updatePatTableBody()" class="btn btn-default">Suchen</button>
    <button id="patReset" type="reset" onmouseover="document.getElementById('patReset').style.color = 'blue'" class="btn btn-default ">Reset</button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newPatientModal">Neuer Patient</button>
  </form>

  <!-- Modal newPatientModal-->
  <div id="newPatientModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Neuen Patienten anlegen</h4>
        </div>
        <div class="modal-body">
          <form class="" action="newPatient.php" method="post">
            <div class="form-group">
              <label for="nachname">Nachname:</label>
              <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
            </div>
            <div class="form-group">
              <label for="vorname">Vorname:</label>
              <input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname">
            </div>
            <div class="form-group">
              <label for="geburtsdatum">Geburtsdatum:</label>
              <input type="date" class="form-control" id="geburtsdatum" name="geburtsdatum" min="1900-01-01" placeholder="Geburtsdatum">
            </div>
            <div class="form-group">
              <label for="diagnose">Diagnose:</label>
              <input type="text" class="form-control" id="diagnose" name="diagnose" placeholder="Diagnose">
            </div>
            <div class="form-group">
              <label for="geschlecht">Geschlecht:</label>
              <br>
              <label class="radio-inline"><input type="radio" id="geschlecht-m" name="geschlecht" value="m" checked>männlich</label>
              <label class="radio-inline"><input type="radio" id="geschlecht-w" name="geschlecht" value="w">weiblich</label>
            </div>
            <button type="submit" class="btn btn-success btn-block">Bestätigen</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Schließen</button>
        </div>
      </div>
    </div>
  </div>

  <div class="table-responsive" style="width:95%;margin: 0 auto">
    <table id="patTable" class="table table-hover">
      <thead>
        <tr>
          <th>Nachname</th>
          <th>Vorname</th>
          <th>Geburtsdatum</th>
          <th>Geschlecht</th>
					<th>Gewählter Patient</th>
        </tr>
      </thead>
      <tbody id="patTable_Body">
      </tbody>
    </table>
  </div>


<div class="col-xs-12" style="height:10px;"></div>

 <ul class="nav nav-tabs nav-justified">
   <li><a data-toggle="tab" href="#Verlauf-Tab">Verlauf</a></li>
   <li><a data-toggle="tab" href="#Labor-Tab">Labor</a></li>
   <li><a data-toggle="tab" href="#Decision-Support-Tab">Decision-Support</a></li>
   <li><a data-toggle="tab" href="#Upload-Tab">Upload</a></li>
   <li><a data-toggle="tab" href="#Token-Tab">Token</a></li>
 </ul>

 <div class="tab-content">
   <div id="Verlauf-Tab" class="tab-pane fade">
     <iframe src="verlauf.html" width="100%" height="100%" style="border:none;position:absolute"></iframe>
   </div>
   <div id="Labor-Tab" class="tab-pane fade in active">
     <iframe src="diagramm.php" width="100%" height="100%" style="border:none;position:absolute"></iframe>
   </div>
   <div id="Decision-Support-Tab" class="tab-pane fade">
     <iframe src="patient_Decision-Support.html" width="100%" height="100%" style="border:none;position:absolute"></iframe>
   </div>
   <div id="Upload-Tab" class="tab-pane fade">
     <iframe src="patient_Upload.html" width="100%" height="100%" style="border:none;position:absolute"></iframe>
   </div>
   <div id="Token-Tab" class="tab-pane fade">
     <iframe src="patient_Token.html" width="100%" height="100%" style="border:none;position:absolute"></iframe>
   </div>

 </div>

<!--
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" style="background-color:green;">
        LiverWeb
      </div>
      <div class="col-md-3" style="background-color:blue;">
        Dr. Marcel Vetter
      </div>
      <div class="col-md-1" style="background-color:yellow" >
       <img src="pictures/UK-Erlangen-Logo.jpg" class="img-rounded img-responsive" alt="UK Erlangen" width="100%">


      </div>
    </div>
    <div class="row">
      <div class="col-md-2" style="background-color:red">
        <div class="btn-group btn-group-justified" style="background-color:red">
          <div class="btn-group">
            <button type="button" class="btn btn-primary" name="btn_Patient1">Patient</button>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary" name="btn_Kohorte1">Kohorte</button>
          </div>
        </div>
      </div>
      <div class="col-md-10" style="background-color:green">
        <div class="btn-group btn-group-justified" style="background-color:blue">
          <div class="btn-group">
            <button type="button" class="btn btn-info"name="btn_Verlauf">Verlauf</button>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-info"name="btn_Labor">Labor</button>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-info"name="btn_DecisionSupport">Decision-Support</button>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-info"name="btn_Upload">Upload</button>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-info"name="btn_Token">Token</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1 text-center" style="background-color:grey">
        <button type="button" class="btn btn-primary btn-block" name="btn_Patient">Patient</button>
      </div>
      <div class="col-md-1 text-center" style="background-color:pink">
        Kohorte
      </div>
      <div class="col text-center" style="background-color:grey200">
        Verlauf
      </div>
      <div class="col text-center" style="background-color:grey300">
      Labor
      </div>
      <div class="col text-center" style="background-color:grey400">
      Dec.-Support
      </div>
      <div class="col text-center" style="background-color:grey500">
      Upload
      </div>
      <div class="col text-center" style="background-color:grey600">
      Token
      </div>
    </div>
    <div class="row">
      <div class="col-md-2" style=background-color:cyan>
        <table class="table-hover table-responsive">
          <thead>
            <tr>
              <th>Nachname</th>
              <th>Vorname</th>
              <th>Geburtsdatum</th>
              <th>m/w</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mustermann</td>
              <td>Max</td>
              <td>01.01.1970</td>
              <td>m</td>
            </tr>
            <tr>
              <td>Mayer</td>
              <td>Erik</td>
              <td>01.01.1960</td>
              <td>m</td>
            </tr>
            <tr>
              <td>Muster</td>
              <td>Paul</td>
              <td>01.01.1950</td>
              <td>m</td>
            </tr>
            <tr>
              <td>Musterfrau</td>
              <td>Maria</td>
              <td>01.01.1990</td>
              <td>w</td>
            </tr>
          </tbody>
        </table>

        <h3>Patientenliste</h4>
        <p> Mustermann, Max *01.01.1970</p>


        <h3>Kohortenauswahl</h4>
        <p>Mayer, Erik *01.01.1960</p>
        <p>Muster, Paul *01.01.1950</p>
      </div>

    </div>
  </div>
-->
  <!-- Bootstrap javascript. jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> -->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>