<?php include 'db/connection.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>Miniproject Titles</title>
    <!-- Adding image in the title of the page -->
  <link rel="shortcut icon" href="Images/Bmsit_logo.png" type="image/x-icon">
  <!-- css style sheets -->
  <link rel="stylesheet" href="stylesheet/style.css">
  <link rel="stylesheet" href="stylesheet/header.css">
  </head>
  <body>
    <header>
        <img class="logo" src="Images/Bmsit_logo.png" alt="Bmsit_logo" width="100" height="100">
          <span class="name">
            <span class="cname">BMS</span>
            <div class="fname">INSTITUE OF TECHNOLOGY AND MANAGEMENT</div>
          </span>
    </header>

    <div class="loader-wrapper">
      <div class="loader">
      </div>
    </div>


        <div class="container">
          <form action="index.php">
            <div class="row">
              <div class="col-25">
                <label for="fname">Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="fname" placeholder="Your name.." required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fusn">Your USN</label>
              </div>
              <div class="col-75">
                <input type="text" id="fusn" name="fusn" placeholder="Your USN.." required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="sname">Teammates Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="sname" name="sname" placeholder="Your Teammates Name.." required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="susn">Team Mates USN</label>
              </div>
              <div class="col-75">
                <input type="text" id="susn" name="susn" placeholder="Your Teammates Usn.." required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="section">Section</label>
              </div>
              <div class="col-75">
                <select id="section" name="section" required>
                  <option value="" selected disabled>Section</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="subject">Miniproject Topic</label>
              </div>
              <div class="col-75">
                <textarea id="topic" name="topic" placeholder="Miniproject Topic Name.." required></textarea>
              </div>
            </div>
            <div class="row">
              <input type="submit" name="submit" onclick="myFunction()" value="Submit">
            </div>
          </form>
        </div>

          <?php
          if (isset($_GET['submit'])) {
              register();
        	}
   ?>

          <?php
          function register(){
            global $conn,$fname,$fusn,$sname,$susn,$sec,$topic;

            $fname=$_GET['fname'];
            $sname=$_GET['sname'];
            $fusn=$_GET['fusn'];
            $susn=$_GET['susn'];
            $sec=$_GET['section'];
            if (isset($_GET['topic'])) {
          		$topic=$_GET['topic'];
          	}

            $query = "INSERT INTO miniproject (fname, usn, sname, susn , section,topic)
						  VALUES('$fname', '$fusn', '$sname', '$susn' , '$sec' ,'$topic')";
            				mysqli_query($conn, $query);
            				header('location: index.php');
                    }

           ?>
          <?php
          // Create connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM miniproject";
          $result = $conn->query($sql);
          echo "<table>"; // start a table tag in the HTML
          echo  " <tr>
                <th>ID</th>
                <th>Name</th>
                <th>USN</th>
                <th>Teammates Name</th>
                <th>Teammates USN</th>
                <th>Section</th>
                <th>Topic</th>
                </tr>";
          if ($result->num_rows > 0) {
              // output data of each row
                    while($row = $result->fetch_assoc()) {
                         echo  " <tr>".
                                 "<td>". $row["id"]." </td>".
                                 "<td>". $row["fname"]." </td>".
                                 "<td>". $row["usn"]." </td>".
                                 "<td>". $row["sname"]." </td>".
                                 "<td>". $row["susn"]." </td>".
                                 "<td>". $row["section"]." </td>".
                                 "<td>". $row["topic"]." </td>"."<br>".
                                 "</tr>";
                               }
                      } else {
                          echo "";
                      }

          echo "</table>"; //Close the table in HTML


          $conn->close();
          ?>
            <script type="text/javascript">
                $(window).load(function() {
                $(".loader").fadeOut("slow");
                });
            </script>
            <script>
              window.onload = function() {setTimeout(function(){document.body.style.opacity="100";},500);};
            </script>
            <script>
            function myFunction() {
              document.querySelector(".success").innerHTML="Successfully Submitted";
            }
            </script>

            <footer>
              <div class ="ct"><center>Copyright © All Rights Reserved | Developed by Bmsitian</center><div>
            </footer>
  </body>
</html>
