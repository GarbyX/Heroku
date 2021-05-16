    <?php

    	$msg = "";
		
		if (isset($_POST['upload']))  {                               # if upload button is pressed  ---	if (isset(var))
														    		
    		$target = "web/".basename($_FILES['image']['name']);	 # the path to store the uploaded image    --- "images/".basename(path)

    		# Connect to the database
		        $servername = "localhost";  
				$username = "root";
				$password = "";
				$database = "images";

				$db = new mysqli($servername, $username, $password, $database);
		  		# $db = new mysqli("localhost", "root", "", "images");

		  		$table = "fashion_gents";		  			# Get all the  submitted form data from the form

		  		$image = $_FILES['image']['name'];
		  		$text = $_POST["text"];
 
		  		$sql = "INSERT INTO $table (image, txt) VALUES ('$image','$text')";

		  		mysqli_query($db, $sql);   					# stores the submitted data into the database table i.e. fashion_gents

		  		# Now let's move the uploaded image into the folder 'web'  --- 	if (move_uploaded_file(filename, destination))

			  		if (move_uploaded_file($_FILES['image']['tmp_name'], $target))  {
			  			$msg = "Image uploaded successfully.";
			  			}
			  		else{
			  			$msg = "There was a problem uploading image.";
			  		}	
    	}

        // echo "Hello, " . $name . "<br>";
      
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style type="text/css">
    	body {
    		 font-family: 'Trebuchet MS', sans-serif;
            background-color: cornflowerblue;
            color: #000;
            /*max-width: 30%;*/
            width = 0px;
        }
    	h1{
    		text-align: center;
    	}
    	div, p{
    		padding: 20;
    	}
    	#content{
    		width: 50%;
    		margin: 20px auto;
    		border: 1px solid #cbcbcb;
    		 background-color: bisque;
    		 padding: 20;
    	}
    	form{
    		width: 50%;
    		margin: 20px auto;    		
    		 background-color: lightskyblue;    		 
    	}
	    form div{
	    	font-family: 'Trebuchet MS', sans-serif;
   			width: 50%;
   			margin: 20px auto; 
   			padding: 20;
    	}
    	#img_div{
    		width: 50%;
    		padding: 5px;
    		margin: 15px auto;
    		border: 2px solid #cbcbcb;
    		 background-color: pink; 	
    		 padding: 20;	
    	}
    	#img_div:hover{
    		width: 50%;
    		padding: 5px;
    		margin: 15px auto;
    		border: 2px solid #cbcbcb;
    		 background-color: #000;
    		 color: #fff;	
    		 padding: 20;
    	}
    	#img_div:after{
    		content: "";
    		display: block;
    		clear: both; 
    		border: 1px solid #cbcbcb;   
    		background-color: red; 	 		
    	}
    	img{
    		float: left;
    		margin: 5px;
    		width: 100px; 
    		height: 140px;
    	}
    	img:hover{
    		float: right;
    		margin: 5px;
    		width: 180px; 
    		height: 240px;
    		border: 4px solid yellow;
    	}

		ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #333;
		}

		li {
		  float: left;
		}

		li a {
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}

		/* Change the link color to #111 (black) on hover */
		li a:hover {
		  background-color: purple;
		}
    </style>

    <title> Bourbon Pavarotti&reg Collections | New Arrivals </title>

</head>

<!--   ------------------- HEAD & BODY -----------------------    -->

<body>

	<ul>
	  <li><a href="#default.asp">Home</a></li>
	  <li><a href="#news.asp">Fashion News</a></li>
	  <li><a href="#Milan 2022 tour.asp">Milan Fashion 2022</a></li>
	  <li><a href="#Milan 2022 tour.asp">Brussels Modelling</a></li>
	  <li><a href="#Lagos.asp">Lagos Outlets</a></li>
	  <li><a href="#contact.asp">Contact Us</a></li>
	  <li><a href="#about.asp">About</a></li>
	</ul>

 <p> Enter Company name: <input type="text" name="name"> <br><br> </p>

    	  	<hr width="60%">

	<div id = "content">

		<h1> Bourbon Pavarotti Collections </h1>

		<!-- Code to fetch image from database -->

		<?php 

			$db = new mysqli( "localhost", "root", "", "images" );
			$sql = "SELECT * FROM fashion_gents";
			$result = mysqli_query($db,$sql);

				while ($row = mysqli_fetch_array($result))  {
					echo "<div id = 'img_div'>";
						echo "<img src='web/" . $row['image'] . "'>";
						echo "<p>" . $row['txt'] . "</p>" ;							// $text = $_POST["txt"];
					echo "</div>";
			}

			/* 
			if (!$result) {
				printf("Error: %s\n", mysql_error($db));
				exit();
			}
			else {
				while ($row = mysqli_fetch_array($result))  {
					echo "<div id = 'img_div'>";
						echo "<img src='images/" . $row['image'] . "'>";
						echo "<p>" . $row['text'] . "</p>" ;
					echo "</div>";
				}
			}
			*/
		?>

		<!-- Front End Form -->

	    <form action="" method="post" enctype="multipart/form-data"> 
	    	 <p> Enter Location: <input type="text" name="name"> <br><br> </p>

	    	<input type="hidden" name="size" value="1000000">
	    			<div>  	</div>	    	

    <!--  Above is div for displaying uploaded pics & below is input component for new uploads -->                
    		<div> 
    		   <input type="file" name="image" > 
    		</div>

    		<div>
    		 	<textarea name="text" cols="40" rows="4" placeholder="Image description"> </textarea>
    		</div>

    		<div>
    		 	<input type="submit" name="upload" value="Upload Image">
    		</div>

    	</form>
    	
    </div>

</body>
</html>