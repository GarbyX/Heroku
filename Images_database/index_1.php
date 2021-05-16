<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  MySQL Database | Insert Images </title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data"> <br><br>

    Enter Company name: <input type="text" name="name"> <br><br>

  <!--   <input type="submit"> <br> <br> -->

    <input type="file" name="userfile[]" value="" multiple=""> <br><br>

    <input type="submit" name="Submit" value="Upload"> <br><br><br><br>
    
    </form>

<hr width="60%">

</body>



    <?php 

            $host = "localhost";  // $servername
		    $username = "root";
		    $password = "";
		    $database = "images";

            // Create connection

		    $mysqli = new mysqli($host, $username, $password, $database) or die($mysqli->connect_error);

		    $table = 'fashion';

  		    // Check connection

  		    if ($mysqli->connect_error) {
   			    die("Connection failed: " . $mysqli->connect_error);
  			 }
            else{
  		        echo "<h2> Connected successfully to Database. </h2>" ;
             } 

    $phpFileUploadErrors = array(
    	0 => 'There is no error. the file uploaded with success', 
    	1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini', 
    	2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive specified in the website HTML form', 
    	3 => 'The uploaded file was only part uploaded', 
    	4 => 'No file was uploaded', 
    	6 => 'Missing a temporary folder', 
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload'
    			);


    // $_$FILES global variable
    
    if(isset($_FILES['userfile'])){

        // print_r(get_defined_functions()); exit();     - test code to verify code works up to this line

    	$file_array = reArrayFiles($_FILES['userfile']);

    	//pre_r($filearray);

    	for ($i = 0; $i < count ($file_array); $i++) {

            // Parse error: syntax error, unexpected '1' (T_LNUMBER), expecting variable (T_VARIABLE) or '{' or '$' in C:\xampp\htdocs\Images_database\index.php on line 72

            # fixed by replaced the '1' with i 

        	if ($file_array[$i]['error'])
        	{
        		?> <div>
        		<?php echo $file_array[$i]['name'] . '-' . $phpFileUploadErrors[$file_array[$i]['error']];
        		?> </div> <?php
        	}

            else {

                $extension = array('jpg','png', 'gif', 'jpeg');

                # file_ext = explode(delimiter, string)
                $file_ext = explode('.', $file_array[$i]['name']);

                $name =  $file_ext[0];   // This gets the image name

                # $file_ext = end(array)
                $file_ext = end($file_ext);

                // Now to extract the name of the images

                pre_r($file_ext); die;

                    # if (!in_array(needle, haystack))
                    if (!in_array($file_ext, $extension))
                    {
                        ?> <div>
                        <?php echo "{$file_array[$i]['name']} - invalid file extension!" ;
                        ?> </div> <?php   
                    }
                    
                    else {

                         $img_dir = 'web/'.$file_array[$i]['name']; // This is the image directory

                        # move_uploaded_file(filename, destination)
                        move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

                            $sql = "INSERT IGNORE INTO $table (name, img_dir) VALUES ('$name','$img_dir' )";
                            $mysqli->query($sql) or die ($mysqli->error);




                               
                                ?> <div>
                                 <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                                 ?>  </div> <?php   

                                 }
                            }
                        }     
                    }

                    

     	
    	

     ?>