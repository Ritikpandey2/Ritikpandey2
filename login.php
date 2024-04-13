<?php

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			//echo "wrong username or password!";
		}else
		{
			//echo "wrong username or password!";
			header("Location: login.php?error=password");
			die;
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<style type="text/css">

body{
            background-image: url('parul.jpg');
            background-size: cover; /* Adjust image to fit the body*/
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* 100% of the viewport height*/
            margin: 0;
            filter: blur(50%); /* Add blur effect to background */
        }

        #button:hover {
            background-color: blue; /* Change color to blue on hover */
        }
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

    #button{
    padding: 10px;
    width: 100px;
    color: white;
    background-color: lightblue;
    border: none;
    border-radius: 10px; /* Add border radius to all four corners */
}


	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box {
    border-radius: 10px; /* Add border radius to all four corners */
	margin: top x;
    margin: 500px auto; /* Center the box horizontally */
    width: 300px;
    padding: 20px;
    background-color: rgba(169, 169, 169, 0.5); /* semi-transparent gray */
}

	</style>

<body >

	<div id="box">
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			Username<input id="text" type="text" name="user_name" placeholder="Enter your username"><br><br>
			Password<input id="text" type="password" name="password" placeholder="Enter your password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>

	<script type="text/javascript">
    function showError() {
        alert("Wrong username or password!");
    }

    <?php if(isset($_GET['error']) && $_GET['error'] == 'password'): ?>
        showError();
    <?php endif; ?>
</script>

</body>
</html>
