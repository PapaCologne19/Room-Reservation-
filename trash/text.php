<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Simple Program using ITexMo SMS API">
        <meta name="keywords" content="HTML, CSS, PHP, ITexMo SMS API">
        <meta name="author" content="Mark Joseph Villarias">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style.css" type="text/css">
        <title>SMS Application</title>
    </head>
    <body>
        <?php
            $mobileNo = $message = "";
            $mobileNoErr = $messageErr = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["mobileNo"])){
                    $mobileNoErr = "Mobile No. is required";
                  }else{
                    $mobileNo = test_input($_POST["mobileNo"]);   
                    
                    // check if Mobile No. only contains numbers
                    if(!preg_match("/^[0][9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/",$mobileNo)) {
                      $mobileNoErr = "Only Numbers allowed and format should be 09XXXXXXXXX";
                      $mobileNo = "";
                    }
                  }

                  if(empty($_POST["message"])) {
                    $messageErr = "Message is required";
                  }else{
                    $message = test_input($_POST["message"]);
                  }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <h1>Simple SMS Application</h1>
        <div class="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <div>
                    <label>Mobile No.</label>
                    <br>
                    <input type="text" name="mobileNo" value="<?php echo $mobileNo;?>">
                    <span class="input-Error"><?php echo $mobileNoErr;?></span>
                </div>
                <label>Message</label><br>
                <textarea name="message" rows="4" cols="25" maxlength="100"><?php echo $message;?></textarea>
                <span class="input-Error"> <?php echo $messageErr;?></span>
                <br>
                <button type="submit" name="submit">Send</button>
                <span>
                  <?php
                    if((!($mobileNo == "")) AND (!($message == ""))){
                      include_once("text_action.php");
                      // You can get API Code and API Password by requesting from wwww.itexmo.com
                      $result = itexmo($mobileNo, $message,"API Code", "API Password");
                      if ($result == ""){
                      echo "iTexMo: No response from server!!!";	
                      }else if ($result == 0){
                      echo "Message Sent!";
                      }
                      else{	
                      echo "iTexMo: there is a server problem";
                      }
                    }
                  ?>
                </span>
            <form>
        </div>     
    </body>
</html>