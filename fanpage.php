<!--Taylor Roberts-->
<!--DATA BASE AND WEB INTEGRATION-->
<!--14 APRIL 2022-->
<!--PHP FAN PAGE-->
<!DOCTYPE html>
<html>
   <head>
      <title>VELVET UNDERGROUND & NICO FAN PAGE</title>
   </head>

   <body style="font-family: verdana; background-color: rgb(224, 224, 204)">
      <h1 style="color: rgb(92, 153, 194); outline-style: solid; text-align: center; outline-width: 4px">VELVET UNDERGROUND FAN PAGE</h1>

      <!-- Description-->
      <table>
         <tr>
            <th>
               <!-- Image-->
               <img style="border-radius: 25px; padding: 8px" src="https://thevinylfactory.com/wp-content/uploads/2018/08/velvetunderground-experience-exhibition-vinylfactory.jpg" width="420" height="300" />
            </th>
            <th style="text-align: center">
               <!-- Image-->
               <img style="border-radius: 25px; padding: 8px" src="https://live.staticflickr.com/7207/6813450964_ec681e7802_b.jpg" width="400" height="300" />
            </th>
            <th style="text-align: center">
               <!-- Image-->
               <img style="border-radius: 25px; padding: 8px" src="https://www.rollingstone.com/wp-content/uploads/2018/06/rs-velvet-underground-nico-dc294bbb-3534-4a18-ba6a-4336a5699648.jpg" width="370" height="300" />
            </th>
            <th style="text-align: center">
               <!-- Form and submit button for name and email-->
               <p>Sign up to recieve email updates:</p>

<?php
$display = true;
$dbName = "fanpageDB";

if ($display) {
	$fanpageDB = @mysqli_connect("database-1.covy5tyii3wq.us-east-1.rds.amazonaws.com", "admin", "iss4014db", $dbName);

	if (!$fanpageDB) { 
		die ("Connection failed: ". mysqli_connect_errno() . ": ".mysqli_connect_error());
	}
   echo "<form method='post'>";
   echo "<label for='fname'>First Name </label><br>";
   echo "<input placeholder='First Name' type='text' name='fname' id='fname' required><br>";
   echo "<label for='lname'>Last Name </label><br>";
   echo "<input placeholder='Last Name' type='text' name='lname' id='lname' required><br>";
   echo "<label for='email'>Email </label><br>";
   echo "<input placeholder='Email' type='text' name='email' id='email' required><br>";
   echo "<input type='submit' name='Submit' value='Submit' />";
echo "</form>";

 echo '</th></tr></table>';

         echo '<table>';
         echo '<tr>';
            echo '<th style="outline-style: solid; color: rgb(92, 153, 194); outline-width: 4px; width: 50%">';
               echo '<h3 style="color: rgb(0, 0, 0)">Who is the Velvet Underground?</h3>';
               echo '<p style="text-align: left; font-weight: normal; color: rgb(0, 0, 0)">';
                  echo "The Velvet Underground was an American rock band formed in New York City in 1964. The original line-up consisted of singer/guitarist Lou Reed, multi-instrumentalist John Cale, guitarist Sterling Morrison, and drummer Angus MacLise. MacLise was replaced by Moe Tucker in 1965, who played on most of the band's recordings. Their integration of rock and the avant-garde achieved little commercial success during the group's existence, but they are now recognized as one of the most influential bands in rock, underground, experimental, and alternative music. The group's provocative subject matter, musical experiments, and often nihilistic attitudes also proved influential in the development of punk rock and new wave music.";
               echo '</p>';
               
               //<!-- Link for documentary-->
               echo '<h4 style="color: rgb(0, 0, 0)">Click below to watch the Velvet Underground Documentary and learn more:</h4>
               <p style="font-weight: normal">
                  <a style="color: white; background-color: rgb(92, 153, 194); border-radius: 25px; padding: 8px" href="https://tv.apple.com/us/movie/the-velvet-underground/umc.cmc.69ic79cvvy80epfhz5efdgjjd?action=play">Velvet Underground Documentary</a>
               </p>
            </th>';

            echo '<th style="outline-style: solid; color: rgb(92, 153, 194); outline-width: 4px">';
               //<!-- Cool Facts Part-->
               echo '<div style="text-align: left">';
                  echo '<h3 style="text-align: center; color: rgb(0, 0, 0)">Cool Facts</h3>';
                  echo '<ol style="font-weight: normal; color: rgb(0, 0, 0)">';

                  // QUERY TO GET LIST ITEMS
			         $getList = "SELECT * FROM list";

			         if (!$lists = mysqli_query($fanpageDB, $getList)) {
				         die ("Error with query: ". mysqli_connect_errno() . ": ". mysqli_connect_error());
			         }
			
			         while ($row = mysqli_fetch_assoc($lists)) {
				         echo "<li>" .$row ["bulletPoints"] . "</li>";
			         }

                  echo '</ol>';
         echo '</div></th></tr></table>';

      //<!-- Table of band members births and deaths-->
      echo '<div>';
         echo '<h3>When were the people in the band born?</h3>';
         echo '<table style="border: 1px solid black; width: 100%; text-align: center">';

         //get names query
         $getName = "SELECT * FROM table1";
      
				if (!$getName = mysqli_query($fanpageDB, $getName)) {
					die ("Error with query: ". mysqli_connect_errno() . ": ". mysqli_connect_error());
				}
				
            echo '<td></td>';
				while ($row = mysqli_fetch_assoc($getName)) {
					echo '<td style="border: 1px solid; font-weight: bold">' .$row ["name"] . "</td>";
				}

            echo '<tr>';
            echo '<td>BORN</td>';
         
         //get birth query
         $getBirth = "SELECT * FROM table1";
         if (!$getBirth = mysqli_query($fanpageDB, $getBirth)) {
            die ("Error with query: ". mysqli_connect_errno() . ": ". mysqli_connect_error());
         }
         
         while ($row = mysqli_fetch_assoc($getBirth)) {
            echo '<td style="border: 1px solid">' . $row ["born"] . "</td>";
         }
           
            echo '</tr>';
            echo '<tr>';
         echo '<td>DIED</td>';
         //get death query
         $getDeath = "SELECT * FROM table1";
         if (!$getDeath = mysqli_query($fanpageDB, $getDeath)) {
            die ("Error with query: ". mysqli_connect_errno() . ": ". mysqli_connect_error());
         }
      
         while ($row = mysqli_fetch_assoc($getDeath)) {
            echo '<td style="border: 1px solid">' . $row ["died"] . "</td>";
         }
            echo '</tr>';
         echo '</table>';
      echo '</div>';


      mysqli_close($fanpageDB);
}

if (isset($_POST['Submit'])) {
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $email = $_POST['email'];

         $fanpageDB = @mysqli_connect("database-1.covy5tyii3wq.us-east-1.rds.amazonaws.com", "admin", "iss4014db", $dbName);

	      if (!$fanpageDB) { 
		   die ("Connection failed: ". mysqli_connect_errno() . ": ".mysqli_connect_error());
         }
      
         //get info to store in database
         $getInfo = "INSERT INTO form VALUES (\"" . $fname . "\", \"" . $lname . "\", \"" . $email . "\");"; 
         if (!$result = mysqli_query($fanpageDB, $getInfo)) {
            die ("Error with insertion query: ". mysqli_connect_errno() . ": ". mysqli_connect_error());
         }
      

   mysqli_close($fanpageDB);
	$display = false;

   }
   ?>
   </body>
</html>

