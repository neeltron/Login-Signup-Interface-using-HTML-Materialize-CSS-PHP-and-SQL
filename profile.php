<?php
include('session.php');
$msg = false;
$assnmt = false;
$link = mysqli_connect("localhost", "id9185345_students", "jext101", "id9185345_students");
$sql = "SELECT code FROM premium where username = '$user_check'";
$result = $connection->query($sql);
$ins = "SELECT Instructor FROM premium where username = '$user_check';";
$msgstore = "SELECT * FROM stuchat;";
if(isset($_POST['subchat']))
{
    $msg = mysqli_real_escape_string($link, $_REQUEST['msg']);
    $message = "INSERT INTO stuchat (Name, Message) VALUES ('$user_check','$msg');";
    if(mysqli_query($link, $message))
    {
        header("location: profile.php#assnmtsub");
    }
}
if(isset($_POST['assnmtsub']))
{
$assnmt = mysqli_real_escape_string($link, $_REQUEST['assnmt']);
$assignment = "UPDATE accounts set Assignment = '$assnmt' WHERE username = '$user_check';";
    if(mysqli_query($link, $assignment))
    {
        header("location: profile.php");
    }
}
$chatres = $connection->query($msgstore);
$result2 = $connection->query($ins);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $code = $row["code"];
    }
} 
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $instructor = $row["Instructor"];
    }
}

else {
    echo "0 results";
}
if ( isset( $_POST['submit'] ) ) { 
    header("location: test.php");
}

?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
      <title>Cognitio</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<style>
.carousel .carousel-item {
width:400px !important;}
</style>
    <body bgcolor = turquoise>
	      
        <nav>
      <div class="nav-wrapper blue">
        <a href="#!" class="brand-logo">&nbsp;&nbsp;Cognitio</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href = "index.html" class = "btn red waves-effect waves-light">Home</a></li>
          <li><a href = "login.html" class = "btn green waves-effect waves-light">Login</a></li>
          <li><a href = "contact.html" class = "btn red waves-effect waves-light">Contact</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
          
        </ul>
      </div>
    </nav>
  <center>
  <div class = "">
  <div class="section white hoverable">
  
    <div class="row container">
      <h2 class="header">&nbsp;Welcome to Cognitio, <i><?php echo $user_check; ?></i>.</h2>
      
              <h4>Follow the step-by-step process for the best experience.</h4>
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header">
              <i class="material-icons">filter_drama</i>Step 1: Analyzing your Learning Style
            </div>
            <div class="collapsible-body">
               <h2 class="header">&nbsp;Let's analyze your Learning style!</h2>
      

<form method = "POST" action="test.php">
    Note: Your response will not be shared with anyone. So please answer the questions honestly for your own evaluation.
    <p>Q1. Which way do you think is the most comfortable while learning?<br>
	<input id="c1" name="group1" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c1">Listening</label>
<br>
	<input id="c2" name="group1" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c2">Reading</label>
<br>
	<input id="c3" name="group1" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c3">Performing</label>
    </p>
	<p>Q2. How do you feel about school?<br>
	<input id="c4" name="group2" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c4">Great way of learning things.</label>
<br>
	<input id="c5" name="group2" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c5">Somewhat Average</label>
<br>
	<input id="c6" name="group2" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c6">Useless, because I can't understand anything even if I try to!</label>
	</p>

	<p>Q3. Which way do you usually remember things?<br>
	<input id="c7" name="group3" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c7">A song plays in my head, giving me the result.</label>
<br>
	<input id="c8" name="group3" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c8">I can picture that source of information in my mind.</label>
<br>
	<input id="c9" name="group3" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c9">After working on it physically and mentally</label>
	</p>
	<p>Q4. Which of the following are you the best at?<br>
	<input id="c10" name="group4" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c10">Classroom Student-Teacher interactions</label>
<br>
	<input id="c11" name="group4" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c11">Drawing Graphs, Charts and Diagrams</label>
<br>
	<input id="c12" name="group4" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c12">Performing experiments</label>
	</p>
	<p>Q5. Which manner is most comfortable for you while taking notes?<br>
	<input id="c13" name="group5" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c13">Recording</label>
<br>
	<input id="c14" name="group5" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c14">Using Flow Charts, Diagrams and Graphs</label>
<br>
	<input id="c15" name="group5" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c15">Notes?</label>
	</p>
	<p>Q6. Which of the following are you the best at?<br>
	<input id="c16" name="group6" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c16">Storytelling, Debates, Reading</label>
<br>
	<input id="c17" name="group6" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c17">Drawing and Presenting</label>
<br>
	<input id="c18" name="group6" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c18">Fixing and tinkering with things</label>
	</p>
	<p>Q7. How do you learn to spell words?<br>
	<input id="c19" name="group7" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c19">By reading them out loud.</label>
<br>
	<input id="c20" name="group7" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c20">By writing them again and again.</label>
<br>
	<input id="c21" name="group7" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c21">I just do, it comes to me naturally.</label>
	</p>
	<p>Q8. Which type of teachers do you prefer?<br>
	<input id="c22" name="group8" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c22">Ones that focus on the lecture a lot.</label>
<br>
	<input id="c23" name="group8" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c23">Ones that do presentation and explain stats using graphs.</label>
<br>
	<input id="c24" name="group8" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c24">Ones that explain everything with practical examples.</label>
	</p>
	<p>Q9. Which type of Extracurriculars do you like?<br>
	<input id="c25" name="group9" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c25">Ones that involve singing.</label>
<br>
	<input id="c26" name="group9" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c26">Drama</label>
<br>
	<input id="c27" name="group9" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c27">Activities involving Athletics</label>
	</p>
	<p>Q10. Which prase do you use the most?<br>
	<input id="c28" name="group10" type="radio" onclick="if(this.checked){o1()}" />   
	<label for="c28">"That sounds cool!"</label>
<br>
	<input id="c29" name="group10" type="radio" onclick="if(this.checked){o2()}" />  
	<label for="c29">"I get the picture!"</label>
<br>
	<input id="c30" name="group10" type="radio" onclick="if(this.checked){o3()}" />  
	<label for="c30">"Let me try."</label>
	</p>
	
	<button onclick="result()" id = "submit" name = "submit" value = "submit">Click me</button>
	<input id = "temp" name = "temp" value = "<?php echo $code; ?>" readonly></input>
  </form>
<script>
var a = 0, b = 0, c = 0, text, perk = 0, pera = 0, perv = 0;
function o1() 
{
	a++;
}
function o2() 
{
	b++;
}
function o3() 
{
	c++;
}
function result() 
{
/*	perk = (c/10)*100;
	pera = (a/10)*100;
	perv = (b/10)*100;
	alert("You are "+pera+"% Auditory, "+perv+"% Visual and "+perk+"% Kinesthetic! We'd recommend you to go through our xyz module");
    resp = pera+"A"+perv+"V"+perk+"K";
    */
    if ( a>b && a>c )
    {
        resp = "Auditory";
    }
    else if ( b>a && b>c )
    {
        resp = "Visual";
    }
    else if ( c>a && c>b )
    {
        resp = "Kinesthetic";
    }
    document.getElementById("temp").value = resp;
}
</script> 
            </div>
          </li>
          <li>
            <div class="collapsible-header">
              <i class="material-icons">filter_drama</i>Step 2: What are your interests?
            </div>
            <div class="collapsible-body">
              <span><form method = "POST" action = "subhob.php">
                  <div class = "input-field">
                  <input type = "text" id = "hobby1" name = "hobby1">
                  <label for = "hobby1">First Hobby</label>
                  </div>
                  <div class = "input-field">
                  <input type = "text" id = "hobby2" name = "hobby2">
                  <label for = "hobby2">Second Hobby</label>
                  </div>
                  <div class = "input-field">
                  <input type = "text" id = "hobby3" name = "hobby3">
                  <label for = "hobby3">Third Hobby</label>
                  </div>
                  <button id = "subhob" name ="subhob">Submit</button>
              </form></span>
            </div>
          </li>
          <li>
            <div class="collapsible-header">
              <i class="material-icons">filter_drama</i>Step 3: Here's your module
            </div>
            <div class="collapsible-body">
                <form  method = POST action = profile.php>
	<input id = "tmp" name = "tmp" value = "<?php echo $code; ?>" readonly></input>
	<button href = "profile.php">Click me</button>
	</form>
              
              <?php if($code == "Visual") : ?>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ifrHogDujXw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php elseif($code == "Auditory") : ?>
    I'll add an audio here
<?php else : ?>
    Experience weather outside or investigate weather through data, graphs and maps. These activities range from simple explorations of snow, to more through analysis of climate change and weather.
<?php endif; ?>
            </div>
          </li>
        </ul>

      
     
<div id="profile">
<input id = "tmp" name = "tmp" value = "<?php echo "Instructor: $instructor"; ?>" readonly></input>
<form method = "POST" action = "profile.php">
Assignment: <input id = "assnmt" name = "assnmt" ></input>
<button id = "assnmtsub" name = "assnmtsub" class = "button red">Submit</button>
</form>
</br>
<form method = "POST" action = "profile.php">
Student interaction:
<?php
 echo "<table>"; // start a table tag in the HTML

    while($row = mysqli_fetch_array($chatres))
    {   
        echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Message'] . "</td></tr>"; 
    }

    echo "</table>";

?>
<div class = "input-field">
<input type = "text" name = "msg" id = "msg"></input>
<label for = "msg"></label>
</div>
<button id = "subchat" name = "subchat">Message</button>
</form>
</br>
</br>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
	  
</div>
    </div>
  </div>
</center>
  
  <div class="fixed-action-btn" style="bottom:45px;right:24px">
          <a id="menu" onclick="$('.tap-target').tapTarget('open')" class="waves-effect waves-light btn btn-floating btn-large yellow">
            <i class="material-icons">chat</i>
          </a>
        </div>
        <!-- TAP TARGET CONTENT -->
        <div class="tap-target orange" data-activates="menu">
          <div class="tap-target-content white-text">
                          <iframe 
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/39f86012-8e61-43fe-a6ff-e31da7723c7b">
</iframe>
        </div>

  



      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
      <script>
        $(document).ready(function(){
          // Init Carousel
          $('.carousel').carousel();

          // Init Carousel Slider
          $('.carousel.carousel-slider').carousel({fullWidth:true});

          // Fire off toast
          //Materialize.toast('Hello World', 3000);

          // Init Slider
          $('.slider').slider();

          // Init Modal
          $('.modal').modal();

          // Init Sidenav
          $('.button-collapse').sideNav();
        });
      </script>
<script language = "javascript">
 $(document).ready(function(){
      $('.parallax').parallax();
    });
</script>
       <script>
          $(".button-collapse").sideNav();
       </script>

    </body>
  </html>
