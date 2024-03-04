<!DOCTYPE html>
<html lang="en">
<head>
	 <title>Student Hub</title> 
	  <meta charset="utf-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php include("includes/stylesheets.php"); ?>
	 </head>
		<body>

<div class = "content_area">
	
	<div class = "display_area">
		<img src = "images/campus_booking.png"/>
		<form method = "POST" action = "campus_booking.php">
		
		
		
		<label>Select Current Location:</label>
			<select name = "loc_1">
				<option>Bird Street Campus</option>
				<option>George Campus</option>
				<option>Missionvale Campus</option>
				<option>North Campus</option>
				<option>Ocean Sciences Campus</option>
				<option>Second Avenue Campus</option>
				<option>South Campus</option>
		 </select>
		</br>
		
		 <label>Destination:</label>
			<select name = "loc_2">
				<option>Bird Street Campus</option>
				<option>George Campus</option>
				<option>Missionvale Campus</option>
				<option>North Campus</option>
				<option>Ocean Sciences Campus</option>
				<option>Second Avenue Campus</option>
				<option>South Campus</option>
		 </select>
		 
		 </br>
		 <label>Date:</label>
			
		 <input class = "date_chooser" type = "date" name = "date_chooser"/>
		 
		</br>
		 
		 
		 <label>Time:</label>
			<select name = "time_booking">
				<option>00:30</option>
				<option>01:00</option>
				<option>01:30</option>
				<option>02:00</option>
				<option>02:30</option>
				<option>03:00</option>
				<option>03:30</option>
				<option>04:00</option>
				<option>04:30</option>
				<option>05:00</option>
				<option>05:30</option>
				<option>06:00</option>
				<option>06:30</option>
				<option>07:00</option>
				<option>07:30</option>
				<option>08:00</option>
				<option>08:30</option>
				<option>09:00</option>
				<option>09:30</option>
				<option>10:00</option>
				<option>10:30</option>
				<option>11:00</option>
				<option>11:30</option>
				<option>12:00</option>
				<option>12:30</option>
				<option>13:00</option>
				<option>13:30</option>
				<option>14:00</option>
				<option>14:30</option>
				<option>15:00</option>
				<option>15:30</option>
				<option>16:00</option>
				<option>16:30</option>
				<option>17:00</option>
				<option>17:30</option>
				<option>18:00</option>
				<option>18:30</option>
				<option>19:00</option>
				<option>19:30</option>
				<option>20:00</option>
				<option>20:30</option>
				<option>21:00</option>
				<option>21:30</option>
				<option>22:00</option>
				<option>22:30</option>
				<option>23:00</option>
				<option>23:30</option>
				<option>00:00</option>
		 </select>
		 </br>
			 <input class = "book_btn" type = "submit" name = "check_Booking" value = "Check Booking"/>
			</br>
			</br>
		 
		
		
		
		<?php
			$current_user = "";
			$source = "";
			$destination = "";
			$time_booking = "";
			$date_chooser = "";
		if(isset($_POST["check_Booking"]))
		{
			include("includes\dbConnection.php");
			$sql1 = "SELECT * FROM bus_booking";
			$query1 = mysqli_query($db_connect,$sql1);
			$rows = mysqli_num_rows($query1);
			
			
			
			$current_user = "user";
			$source = $_POST['loc_1'];
			$destination = $_POST['loc_2'];
			$time_booking = $_POST['time_booking'];
			$date_chooser = $_POST['date_chooser'];
			$number_of_booked = 0;
			
			$sql1 = "SELECT * FROM bus_booking WHERE source = '$source' AND destination = '$destination' AND time_booking = '$time_booking' AND date = '$date_chooser' ";
			$sql2 = "SELECT * FROM bus_booking WHERE username = '$current_user' AND source = '$source' AND destination = '$destination' AND time_booking = '$time_booking' AND date = '$date_chooser'";
			$query1 = mysqli_query($db_connect,$sql1);
			$query2 = mysqli_query($db_connect,$sql2);
			$number_of_booked = mysqli_num_rows($query1);
			$number_of_user_bookings = mysqli_num_rows($query2);
			$booking = mysqli_fetch_array($query2,MYSQLI_ASSOC);
			
			// check if booking was already made
			if($number_of_user_bookings > 0)
			{
				echo "<div style = 'margin-top: 20%;'>";
				echo "<label style = 'color: red; margin: 2%;font-size: 20px;'>The booking was already made</label></br></br>";
				 echo "<h1>Booking Information</h1></br>";
				echo "<table>";
				echo "<tr><th>Number of bookings:</th>";
				echo "<td>$number_of_booked</td></tr>";
				echo "<tr><th>User</th>";
				echo "<td>",$booking['username'],"</td></tr>";
				echo "<tr><th>Current Location</th>";
				echo "<td>",$booking['source'],"</td></tr>";
				echo "<tr><th>Destination</th>";
				echo "<td>",$booking['destination'],"</td></tr>";
				echo "<tr><th>Date</th>";
				echo "<td>",$booking['date'],"</td></tr>";
				echo "<tr><th>Time</th>";
				echo "<td>",$booking['time_booking'],"</td></tr>";
				echo "<tr><th>Booking made:</th>";
				echo "<td>",$booking['book_timestamp'],"</td></tr>";
				echo "</table></br>";
				echo "</div>";
				}
			// error checking
			// campus names cant be the same
			else if($source == $destination)
			{
				
				echo "<label style = 'color: red; margin: 2%;font-size: 20px;'>The source and destination cannot be the same</label>";
			
			}
			
			// everything okay
			else{
				echo "<div style = 'margin-top: 20%;'>";
			echo "<h1>Booking Information</h1></br>";
			
			
			echo "<label>Number of bookings:</label>";
			echo "<label>$number_of_booked</label></br>";
			echo "<label><th>User</label>";
			echo "<label><input type = 'label' name = 'current_user_1' value = '$current_user'></label></br>";
			echo "<label>Current Location</label>";
			echo "<label><input type = 'label' name = 'source_1' value = '$source'></label></br>";
			echo "<label>Destination</label>";
			echo "<label><input type = 'label' name = 'destination_1' value = '$destination'></label></br>";
			echo "<label>Date</label>";
			echo "<label><input type = 'label' name = 'date_chooser_1' value = '$date_chooser'></label></br>";
			echo "<label>Time</label>";
			echo "<label><input type = 'label' name = 'time_booking_1' value = '$time_booking'></label></br>";
			echo "<input class = 'book_btn' type = 'submit' name = 'confirm_Booking' value = 'Confirm Booking'/></tbr>";
			echo "</br>";
			echo "</div>";
			}
			
		
			mysqli_close($db_connect);
		
		}
			
		?>
		
		
		
		<!-- confirm booking -->
		<?php
		if(isset($_POST["confirm_Booking"]))
		{
			// connect to the database
			include("includes\dbConnection.php");
			
			// collect values into variables
			$current_user = $_POST['current_user_1'];
			$source = $_POST['source_1'];
			$destination = $_POST['destination_1'];
			$time_booking = $_POST['time_booking_1'];
			$date_chooser = $_POST['date_chooser_1'];
		
			
		
			$sql = "INSERT INTO bus_booking(username,source,destination,time_booking,date,book_timestamp)
									 VALUES('$current_user','$source','$destination','$time_booking','$date_chooser',now())";
			$query = mysqli_query($db_connect,$sql);
			if($query == TRUE){echo "<script language = 'Javascript'>alert('The booking was a success')</script>";}
			else{echo "<script language = 'Javascript'>alert('Something went wrong with booking')</script>";}
			mysqli_close($db_connect);
			
		}
		?>
		</form>
		
		<div class = "your_bookings">
		<?php
		
			// connect to the database
			include("includes\dbConnection.php");
			
			$sql3 = "SELECT * FROM bus_booking WHERE username = 'user' ORDER BY book_timestamp DESC";
			$query3 = mysqli_query($db_connect,$sql3);
			$booking_number = mysqli_num_rows($query3);
			
			
			echo "<h1>Your Bookings</h1></br>";
			if($booking_number > 0){
			while($row = mysqli_fetch_array($query3,MYSQLI_ASSOC))
			{
			
			echo "<h2>Booking: #$booking_number</h2></br>";
			echo "<table>";
			
			echo "<tr ><th>User</th>";
			echo "<td>",$row['username'],"</td></tr>";
			
			echo "<tr><th>Current Location</th>";
			echo "<td>",$row['source'],"</td></tr>";
			echo "<tr name = 'destination_1'><th>Destination</th>";
			echo "<td>",$row['destination'],"</td></tr>";
			echo "<tr><th>Date</th>";
			echo "<td>",$row['date'],"</td></tr>";
			echo "<tr><th>Time</th>";
			echo "<td>",$row['time_booking'],"</td></tr>";
			echo "<tr><th>Booking made:</th>";
			echo "<td>",$row['book_timestamp'],"</td></tr>";
			
			echo "</table>";
			$booking_number = $booking_number - 1;
			}
			}
			mysqli_close($db_connect);
		?>
		</div>
	</div>

</div>

</body>
</html>
