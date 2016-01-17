<?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = ".338lapuamysql";
        


        $token = $_COOKIE["token"];
        echo $token;
        if($token[0] === "$")
        {

        #echo $_POST["token"];
        
            $conn = new mysqli($servername, $username, $password, "oitgaming");
            $query = "SELECT email FROM users WHERE loginToken = ?;";
            
            $stmt = $conn->prepare($query);

            $stmt->bind_param("s", $token);
            

            if(!$stmt->execute())
            {
                echo "FALSE";
            }   
            else
            {
                $result = $stmt->get_result();
                $row=mysqli_fetch_row($result);
                
                echo $row[0];
                
                
            }
        }
        else
        {
            echo "FALSE";
        }

        ?>