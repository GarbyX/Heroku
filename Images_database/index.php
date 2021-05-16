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
	  <li><a href="index.php">Home</a></li>
	  <li><a href="#news.asp">Fashion News</a></li>
	  <li><a href="#Milan 2022 tour.asp">Milan Fashion 2022</a></li>
	  <li><a href="#Belgium info.asp">Brussels Modelling</a></li>
	  <li><a href="#Lagos.asp">Lagos Outlets</a></li>
	  <li><a href="#contact.asp">Contact Us</a></li>
	  <li><a href="Admin.php" target="blank">Admin</a></li>
	  <li><a href="#about.asp">About</a></li>
	</ul>

 <p> Search Company name: <input type="search" name="name"> <br><br> </p>

    	  	<hr width="60%">

	<div id="content">

		<h1> Bourbon Pavarotti Collections </h1>

		<!-- Code to fetch image from database -->

		<?php 

			$db = new mysqli( "localhost", "root", "", "images" );
			$sql = "SELECT * FROM fashion_gents";

			$result = mysqli_query($db,$sql);

				while ($row = mysqli_fetch_array($result))  {
					echo "<div id = 'img_div'>";
						echo "<img src='web/" . $row['image'] . "'>";
						echo "<p>" . $row['txt'] . "</p>" ;						// prev entry (error later detected) $text = $_POST["txt"];
                        echo "<p>" . $row['price'] . "</p>" ; 
                    // echo "<p>" . $row['time'] . "</p>" ; 
					echo "</div>";
			}
		?>
	
    </div><hr>

        <p> Copyright: 2021 Bourbon Pavarotti&copy Collections </p>

        <br><br>

</body>
</html>