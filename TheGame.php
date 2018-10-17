<!doctype html>

<html>
	<head>
<!--
	    exercise_02_05_01
	    Author: Jonathan Pardo-Cano
	    Date: 10.2.18
	    Filename: TheGame.php
-->
		<title>View Files</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        
        <?php
        $fileName = "TheGamers.txt";
            if(!file_exists($fileName)){
                fopen($fileName, 'w') or die('Cannot open file:  '.$fileName);
                chmod($fileName,0757);
                fclose($fileHandle);
            }
            else{
                if (isset($_POST['save'])) {
                    if (empty($_POST['playername'])) {
                        echo "Please enter your Player name\n";
                    }
                    else {
                        $safeString = stripslashes($_POST['username']) . ",";
                        $safeString .= stripslashes(md5($_POST['password'])) . ",";
                        $safeString .= stripslashes($_POST['name']) . ",";
                        $safeString .= stripslashes($_POST['email']) . ",";
                        $safeString .= stripslashes($_POST['age']) . ",";
                        $safeString .= stripslashes($_POST['playername']) . ",";
                        $safeString .= stripslashes($_POST['comment']) . "\n";
                        $fileHandle = fopen($fileName,"a");
                        if ($fileHandle === false) {
                            echo "There was an error reading file \"$fileName\".<br>\n";
                        }
                        else {
                            fwrite($fileHandle,$safeString);  
                            registeredUsers($safeString,$fileHandle);
                            }
                            echo "<hr>\n";   
                            fclose($fileHandle);
                        }

                    }

                }
        ?>
       <h2>The Game</h2>
       <form action="TheGame.php" method="post">
           Your Username: <input type="text" name="username" required><br>
           Your Password: <input type="password" name="password" required><br>
           Your Full name: <input type="text" name="name" required><br>
           Your E-mail: <input type="email" name="email" required><br>
           Your age: <input type="number" name="age"><br>
           Your Playername: <input type="text" name="playername" required><br>
           <textarea name="comment" cols="100" rows="6"></textarea><br>
           <input type="submit" name="save" value="Submit your comment">
       </form>
       <h2>Registered Users:</h2>
    <?php 
        function registeredUsers($safeString,$fileHandle) {
            echo "<table><th>Registered Users</th>";
            
              $playerName = explode(",",$user);
                var_dump($playerName);
            while(!feof($fileHandle))
              {
              $user = fgets($fileHandle);
                echo $user;
//          echo "<tr><td>$user[5]</td></tr>";
              }
            fclose($fileHandle);
            echo "</table>";
        }
        
    ?>
    </body>
</html>