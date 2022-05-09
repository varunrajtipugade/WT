<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$roll = $name = $mark = "";
$roll_err = $name_err = $mark_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$input_roll = trim($_POST["roll"]);
    if(empty($input_roll)){
        $roll_err = "Please enter Roll Number.";     
    } elseif(!ctype_digit($input_roll)){
        $roll_err = "Please enter a positive integer value.";
    } else{
        $roll = $input_roll;
    }
	
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a Name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
      
    $input_mark = trim($_POST["mark"]);
    if(empty($input_mark)){
        $mark_err = "Please enter the Marks.";     
    } elseif(!ctype_digit($input_mark)){
        $mark_err = "Please enter a positive integer value.";
    } else{
        $mark = $input_mark;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($roll_err) && empty($mark_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO student (roll, name, mark) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_roll, $param_name, $param_mark);
            
            // Set parameters
			$param_roll = $roll;
            $param_name = $name;
            $param_mark = $mark;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Roll No</label>
                            <input type="text" name="roll" class="form-control <?php echo (!empty($roll_err)) ? 'is-invalid' : ''; ?>"><?php echo $roll; ?>
                            <span class="invalid-feedback"><?php echo $roll_err;?></span>
                        </div>
						<div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Marks</label>
                            <input type="text" name="mark" class="form-control <?php echo (!empty($mark_err)) ? 'is-invalid' : ''; ?>"><?php echo $mark; ?>
                            <span class="invalid-feedback"><?php echo $mark_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>