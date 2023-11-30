	
<?php
error_reporting(E_ALL ^ E_WARNING); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>VEX Telematics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>






* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 80px;
  text-align: center;
  background: #e31936;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #b1b3b6;
  color: black;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}


/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
}


/* Footer */
.footer {
  padding: 98px;
  text-align: center;
  background: #e31936;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<?php //this div creates the header for the page witch i keep it the same acorss the whole code ?>

<div class="header">
  <h1>VEX Telematics</h1>
  <p>VEX Europe Services is the provider of the fuel Card in Europe.</p>
</div>
<?php //this div creats the black bar across the the top where i keep the links to extral their webisite ?>
<div class="navbar">
  <a href="https://www.google.com/search?q=your+website&rlz=1C1GCEA_en&oq=YOUR+WEBSITE&aqs=chrome.0.0i512j46i175i199i512j0i512l8.2850j0j15&sourceid=chrome&ie=UTF-8&safe=active&ssui=on" target="_blank">Our Website</a>
  <a href="https://www.linkedin.com" target="_blank">Linked-In</a>
  <a href="https://www.youtube.com" target="_blank">YouTube</a>

  <a href="https://www.google.com/search?q=other+websites&rlz=1C1GCEA_en&oq=other+websites&aqs=chrome..69i57j0i512l9.4719j0j15&sourceid=chrome&ie=UTF-8&safe=active&ssui=on" class="right" target="_blank">website1</a>
  <a class="right"> or </a>
  <a href="https://www.google.com/search?q=other+websites&rlz=1C1GCEA_en&oq=other+websites&aqs=chrome..69i57j0i512l9.4719j0j15&sourceid=chrome&ie=UTF-8&safe=active&ssui=on" class="right" target="_blank">website2</a>
  <a class="right"> Login in to: </a>
</div>

<?php //this div adds the data into the light grey bar witch runs down the left hand side of my program  and it just say a simple message ?>
<div class="row">
  <div class="side">
    <h2>Welcome</h2>

    <h5>please login</h5>
  
  </div>
  <?php //the code below is not used in this code but on other pages their the are big red buttons witch you can interact with ?>
  <div class="main">

    <style>
      .button {
        background-color: #e31936;
        border: none;
        color: white;
        padding: 50px 50px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
  </head>
  
  <body>









  <?php
  // define variables and set to empty values
  $nameErr = $passErr = "";
  $name = $pass = "";
  
  //this if statments is a php varible and it will only run if your actucally page is being ran 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //this if statments is the same across the board but in this example it is taking the varible name and checks to see if it empty 
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      //this is else statment is ran if thier is an input in the varible name 
      //this calls the funcation test_input
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
  
    if (empty($_POST["password"])) {
      $passErr = "password is required";
    } else {
      $pass = test_input($_POST["password"]);
      // check if password is their
      if (!preg_match("/^[]*$/",$pass)) {
        $passErr = "";
      }
    }
  }

  function test_input($data) {
    //this removes any unessary characters eg extra space, tab, newline
    $data = trim($data);
    //this removes backslashs from the userinput
    $data = stripslashes($data);
    //converts special characters to HTML entities
    $data = htmlspecialchars($data);
   return $data;
  }
  ?>

  <?php // this creats the form 
  // the method post sends the form-data as an HTTP post transaction ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <?php //this is taking the users input as a text and autocomplete also me to turn of the drop down menu of recently inputed usernames?>
    Name: <input type="text" name="name" value="<?php echo $name;?>" autocomplete="off">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    <?php //this is the exact same as the one before but the type is called password withc means that is will automattically turn the charaters ?>
    password: <input type="password" name="password" value="<?php echo $pass;?>" autocomplete="off">
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>
    <?php //this creats the value button witch allows you to procces the users input ?>
    <input type="submit" name="submit" value="Submit">  
  </form>





  </body>



<?php


//this encryts the user input of password 
$hashpass=hash('ripemd160', $pass);

//this is used to easyily call the db browser document
$pdo = new PDO('sqlite:login.db');


//this is the the query select username and password and access where userserid = input and passowrd = input
$statement = $pdo->query("SELECT account.UsernameID, account.password, account.access
	FROM account
	WHERE (((account.UsernameID)='$name') AND ((account.password)='$hashpass'));");



//this for loop runs and gets the data 
foreach($statement as $rows){

}
//this then get the last bit of data ran in the for loop in the colomun access and then is stored countrow
$countRow=$rows['access'];
//this if statment checks to see what your access number is
if ($countRow == "2") {
  //this takes them to the main page if your access level is 2 
  ?>
  <script>window.location.href = "10mainpage.php";</script>
  <?php

}elseif ($countRow == "1") {
  //this takes them to the admin page if your access level is 1
  ?>
  <script>window.location.href = "3adminpage.php";</script>
  <?php

//if their is a wrong meaning the user does ot exsit or something is spelt wrong it will spit out this error message
} else {
  echo "enter values that are correct";
}

?>
<?php //this footer class it is the red chunk at the bottom witch show the the logo ?>
<div class="footer">
  <h2>logo</h2>
</div>

</body>
</html>