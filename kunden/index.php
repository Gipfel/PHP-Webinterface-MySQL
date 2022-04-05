<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="master.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tirarzt Kindler | Webinterface</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Kunden hinzufügen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="insertcode.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="formGroupExampleInput">Name</label>
              <input type="text" name="name" id="NAME" class="form-control" placeholder="Hier den Namen bitte!">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Telefonnummer</label>
              <input type="text" name="tele" id="TELE" class="form-control" placeholder="Hier die Telefonnummer bitte!">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Adresse</label>
              <input type="text" name="adresse" id="ADRESSE" class="form-control" placeholder="Hier die Adresse bitte!">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Tier (Tier / Geschlecht / Rasse)</label>
              <input type="text" name="tier" id="TIER" class="form-control" placeholder="Bsp. Hund / weiblich / Jack Russel">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Name des Tieres</label>
              <input type="text" name="tname" id="TNAME" class="form-control" placeholder="Hier den Namen des Tieres bitte">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Geburtsdatum des Tiers</label>
              <input type="text" name="gbdatum" id="GBDATUM" class="form-control" placeholder="Hier das Geburtsdatum oder das Alter bitte!">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Behandlungen</label>
              <textarea name="infos" id="INFOS" rows="8" cols="80" class="form-control" id="formGroupExampleInput2" placeholder="Die Behandlungen des Tieres."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Speichern</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!--####################################################################################-->
  <!-- AdminModal -->
  <div class="modal fade" id="adminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Benutzer erstellen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../register.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="formGroupExampleInput">Benutzername</label>
              <input type="text" name="username" class="form-control" placeholder="Benutzername" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">EMail</label>
              <input type="email" name="email" class="form-control" placeholder="E-Mail" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Passwort</label>
              <input type="password" name="pw" class="form-control" placeholder="Passwort" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Passwort wiederholen</label>
              <input type="password" name="pw2" id="pw2" class="form-control" placeholder="Passwort bestätigen" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
              <button type="submit" name="register" class="btn btn-success">Erstellen</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--####################################################################################-->
  <!-- delete pop up form -->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Kundeneintrag löschen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletecode.php" method="POST">
          <div class="modal-body">

            <input type="hidden" name="delete_id" id="delete_id">

            <h4>Bist du dir sicher, dass du den Dateneintrag löschen möchtest?</h4>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
            <button type="submit" name="deletedata" class="btn btn-danger">Löschen</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!--####################################################################################-->
  <!-- edit pop up form -->
  <div class="modal fade" id="infomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Kunden Informationen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="updatecode.php" method="POST">
          <div class="modal-body">
            <div hidden="true" class="form-group">
              <label for="formGroupExampleInput">id</label>
              <input type="text" name="update_id" id="update_id" class="form-control" placeholder="id">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Behandlungen</label>
              <textarea name="infos3" id="INFOS3" rows="25" cols="700" class="form-control" id="formGroupExampleInput2" placeholder="Die Behandlungen des Tieres."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
            <button type="submit" name="updatedata" class="btn btn-primary">Speichern</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!--####################################################################################-->

  <!--####################################################################################-->
  <!-- delete pop up form -->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Kundeneintrag löschen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletecode.php" method="POST">
          <div class="modal-body">

            <input type="hidden" name="delete_name" id="delete_name">

            <h4>Bist du dir sicher, dass du den Dateneintrag löschen möchtest?</h4>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
            <button type="submit" name="deletedata" class="btn btn-danger">Löschen</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!--####################################################################################-->
  <!--####################################################################################-->
  <!-- logout pop up form -->
  <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Ausloggen?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../logout.php">
          <div class="modal-body">

            <h4>Bist du dir sicher, dass du dich ausloggen möchtest?</h4>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
            <button type="submit" name="logoutdata" class="btn btn-danger">Ausloggen</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!--####################################################################################-->
  <?php
  require_once("dbcontroller.php");
  $db_handle = new DBController();

  $sql = "SELECT * from poster";
  $posts = $db_handle->runSelectQuery($sql);
  ?>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script>
    function createNew() {
      $("#add-more").hide();
      var data = '<tr class="table-row" id="new_row_ajax">' +
        '<td contenteditable="true" id="name" onBlur="addToHiddenField(this,\'NAME\')" onClick="editRow(this);"></td>' +
        '<td contenteditable="true" id="tele" onBlur="addToHiddenField(this,\'TELE\')" onClick="editRow(this);"></td>' +
        '<td contenteditable="true" id="tier" onBlur="addToHiddenField(this,\'TIER\')" onClick="editRow(this);"></td>' +
        '<td contenteditable="true" id="tname" onBlur="addToHiddenField(this,\'TNAME\')" onClick="editRow(this);"></td>' +
        '<td contenteditable="true" id="gbdatum" onBlur="addToHiddenField(this,\'GBDATUM\')" onClick="editRow(this);"></td>' +
        '<td contenteditable="true" id="INFOS" onBlur="addToHiddenField(this,\'INFOS\')" onClick="editRow(this);"></td>' +
        '</tr>';
      $("#table-body").append(data);
    }

    function cancelAdd() {
      $("#add-more").show();
      $("#new_row_ajax").remove();
    }

    function editRow(editableObj) {
      $(editableObj).css("background", "#FFF");
    }

    function saveToDatabase(editableObj, column, id) {
      $(editableObj).css("background", "#FFF url(loaderIcon.gif) no-repeat right");
      $.ajax({
        url: "edit.php",
        type: "POST",
        data: 'column=' + column + '&editval=' + $(editableObj).text() + '&id=' + id,
        success: function(data) {
          $(editableObj).css("background", "#FDFDFD");
        }
      });
    }

    function addToHiddenField(addColumn, hiddenField) {
      var columnValue = $(addColumn).text();
      $("#" + hiddenField).val(columnValue);
    }
  </script>
  <div class="container">
    <div class="jumbotron">
      <div class="card2">
        <h2>Kunden Tabelle</h2>
      </div>
      <div class="card">
        <div class="card-body" style="overflow-x:auto;">
          <div class="card-body1">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#studentaddmodal">Hinzufügen</button> <button type="button" class="btn btn-danger logout">Ausloggen</button> <button type="button" class="btn btn-danger admin">Administration</button>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            <div style="overflow-x:auto;">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Suchen ...">
              <table class="table" id="myTable" class="tbl-qa">
                <thead class="thead-dark">
                  <tr>
                    <th onload="sortTable()" data-indentifier="true" class="table-header" scope="col">Name</th>
                    <th class="table-header" scope="col">Telefonnummer</th>
                    <th class="table-header" scope="col">Adresse</th>
                    <th class="table-header" scope="col">Tier</th>
                    <th class="table-header" scope="col">Tiername</th>
                    <th class="table-header" scope="col">Geburtsdatum</th>
                    <th class="table-header" scope="col">Behandlungen</th>
                    <th hidden="true" class="table-header" scope="col">Infos3</th>
                    <th class="table-header" scope="col">Löschen</th>
                  </tr>
                </thead>
                <?php
                if ($query_run)
                  foreach ($query_run as $row)
                ?>
                <tbody id="table-body">
                  <?php
              if (!empty($posts)) {
                foreach ($posts as $k => $v) {
                  ?>
                      <tr class="table-row" id="table-row-<?php echo $posts[$k]["id"]; ?>">
                        <td contenteditable="true" onBlur="saveToDatabase(this,'NAME','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["NAME"]; ?></td>
                        <td contenteditable="true" onBlur="saveToDatabase(this,'TELE','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["TELE"]; ?></td>
                        <td contenteditable="true" onBlur="saveToDatabase(this,'ADRESSE','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["ADRESSE"]; ?></td>
                        <td contenteditable="true" onBlur="saveToDatabase(this,'TIER','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["TIER"]; ?></td>
                        <td contenteditable="true" onBlur="saveToDatabase(this,'TNAME','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["TNAME"]; ?></td>
                        <td contenteditable="true" onBlur="saveToDatabase(this,'GBDATUM','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["GBDATUM"]; ?></td>
                        <td>
                          <button type="button" class="btn btn-primary infobtn">Mehr Anzeigen</button>
                        </td>
                        <td hidden="true"><?php echo $posts[$k]["INFOS"]; ?></td>
                        <td>
                          <button type="button" class="btn btn-danger deletebtn">Löschen</button>
                        </td>
                      </tr>
                  <?php
                }
              }
                  ?>
                  <style>
                    tr:nth-child(even) {
                      background-color: #f2f2f2
                    }
                  </style>
                  <style media="screen">
                    #myInput {
                      background-image: url('css/searchicon.png');
                      /* Add a search icon to input */
                      background-position: 9px 11px;
                      /* Position the search icon */
                      background-repeat: no-repeat;
                      /* Do not repeat the icon image */
                      background-size: 30px;
                      width: 100%;
                      /* Full-width */
                      font-size: 16px;
                      /* Increase font-size */
                      padding: 12px 20px 12px 40px;
                      /* Add some padding */
                      border: 1px solid #ddd;
                      /* Add a grey border */
                      margin-bottom: 12px;
                      /* Add some space below the input */
                    }

                    #myTable {
                      border-collapse: collapse;
                      /* Collapse borders */
                      width: 100%;
                      /* Full-width */
                      border: 1px solid #ddd;
                      /* Add a grey border */
                      font-size: 18px;
                      /* Increase font-size */
                    }

                    #myTable th,
                    #myTable td {
                      text-align: left;
                      /* Left-align text */
                      padding: 12px;
                      /* Add padding */
                    }

                    #myTable tr {
                      /* Add a bottom border to all table rows */
                      border-bottom: 1px solid #ddd;
                    }

                    #myTable tr.header,
                    #myTable tr:hover {
                      /* Add a grey background color to the table header and on hover */
                      background-color: #f1f1f1;
                    }
                  </style>
                  <style>
                    .card2 h2 {
                      padding: 20px 20px 20px;
                      text-align: center;
                    }

                    .card {
                      border-radius: 30px;
                      margin-bottom: -11px;
                    }

                    .jumbotron {
                      background-color: #0B173B;
                      border-radius: 30px;
                      margin-top: 50px;
                    }

                    .card-body-1 {
                      margin-bottom: 50px;
                    }

                    .card2 {
                      margin-bottom: 25px;
                      margin-top: -40px;
                      color: #fff;
                    }
					.card-body1 {
						display: flex;
						justify-content: space-evenly;
						align-items: center;
					}
                  </style>
                  <style>
					.modal-content {
						background-color: unset;
					}
                    .modal-body {
                      background-color: #0B173B;
                    }

                    .form-group label {
                      color: #fff;
                    }

                    .modal-body h4 {
                      color: #fff;
                    }

                    .modal-footer {
                      background-color: #0B173B;
                    }

                    .modal-header {
                      background-color: #0B173B;
                    }

                    .modal-title {
                      color: #fff;
                    }

                    .close span {
                      color: #fff;
                    }
					::-webkit-input-placeholder { /* Edge */
  						color: #fff;
					}

					:-ms-input-placeholder { /* Internet Explorer */
					  color: #fff;
					}

					::placeholder {
					  color: #fff;
					}
					  
					.form-control {
						background-color: #0B173B;
						color: #fff;
					  	border: 1px solid #ffffff;
						
					}
					.form-control:focus {
						color: #fff;
						background-color: #0B173B;
						border-color: #007aff;
					}

                    @media screen and (max-widht: 1198px) {
                      .card-body1 .btn {
                        position: relative;
                        left: 40%;
                      }

                      .card-body1 .admin {
                        position: relative;
                        left: 55%;
                      }
                    }

                    @media screen and (max-widht: 471px) {
                      .card-body1 .admin {
                        position: relative;
                        left: -46%;
                      }
                  </style>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>
      <script>
        function sortTable() {
          var table, rows, switching, i, x, y, shouldSwitch;
          table = document.getElementById("myTable");
          switching = true;
          /*Make a loop that will continue until
          no switching has been done:*/
          while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
              //start by saying there should be no switching:
              shouldSwitch = false;
              /*Get the two elements you want to compare,
              one from current row and one from the next:*/
              x = rows[i].getElementsByTagName("TD")[0];
              y = rows[i + 1].getElementsByTagName("TD")[0];
              //check if the two rows should switch place:
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
            if (shouldSwitch) {
              /*If a switch has been marked, make the switch
              and mark that a switch has been done:*/
              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
            }
          }
        }
      </script>
      <script>
        $(document).ready(function() {
          $('.logout').on('click', function() {
            $("#logoutmodal").modal();
          });
        });
      </script>
      <script>
        $(document).ready(function() {
          $('.admin').on('click', function() {
            $("#adminmodal").modal();
          });
        });
      </script>
      <script>
        $(document).ready(function() {

          $('.infobtn').on('click', function() {
            $tr = $(this).closest('tr')
            $id = $tr.attr('id')
            $id = $id.replace('table-row-', '')
            $("#infomodal").modal()
            $('#update_id').val($id)

            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();

            $('#NAME2').val(data[0]);
            $('#TELE2').val(data[1]);
            $('#ADRESSE2').val(data[2]);
            $('#TIER2').val(data[3]);
            $('#TNAME2').val(data[4]);
            $('#GBDATUM2').val(data[5]);
            $('#INFOS2').val(data[6]);
            $('#INFOS3').val(data[7]);
          });
        });
      </script>

      <script>
        $(document).ready(function() {

          $('.deletebtn').on('click', function() {
            $tr = $(this).closest('tr')
            $id = $tr.attr('id')
            $id = $id.replace('table-row-', '')
            $("#deletemodal").modal()
            $('#delete_id').val($id)
          });
        });
      </script>
      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>