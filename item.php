<?php 
		
		/* passes session from home page
		session_start();
		
		$itemName = $_SESSION['itemName']; 
		*/
		// passing data by requerying server with get request
		$squery = htmlspecialchars($_GET['squery']);

		$con = mysql_connect('localhost:3306','sadapaac_student','fireflies131') 
			or die('Could not connect to the server!');

		// Select a database:
		mysql_select_db('sadapaac_preservit') 
			or die('Could not select a database.');
		 
		// Example query: (TOP 10 equal LIMIT 0,10 in MySQL)
		// Query we need: (SELECT * FROM foodItem WHERE itemName LIKE ('%$userinput%');
		$SQL = "SELECT * FROM foodItem WHERE itemName LIKE ('$squery%')";
		$SQLFruit = "SELECT * FROM foodItem WHERE category = 'fruit'";
		 
		// Execute query:
		$result = mysql_query($SQL) 
			or die('A error occured: ' . mysql_error());

		$resultFruit = mysql_query($SQLFruit)
			or die ('A error occured: ' . mysql_error());
			
		$fruitList;
		 

		 
		// Generate category items Fruit
		while ($Fruits = mysql_fetch_assoc($resultFruit)){
			$fruitList .= htmlentities("<li><a href='item.php?squery=" . $Fruits['itemName'] . "'>" . $Fruits['itemName'] . "</a></li>\n");
		}
		// example code for fruitlist, not working yet $fruitList = "<li><a href='fruits/" . $Fruits['itemName'] . "'</li>";
		// example html for fruit: <li><a href='fruits/apple.html'>Apple</a></li>
		// donn't make it refer to html pages, gonna try to make it refer to an item.php page that generates the page 
		// old fruit code "<li><a href='fruits/" . $Fruits['itemName'] . "'>" . $Fruits['itemName'] . "</a></li>\n"

		// Fetch rows:
		while ($Row = mysql_fetch_assoc($result)) {
		 
			$itemName = $Row['itemName'];
			$howToPreserve = $Row['howToPreserve'];
			$howToSave = $Row['howToSave'];
			$goingBad = $Row['howToTellIfGoingBad'];
			$recipes = $Row['recipes'];
		 
		}
		$htmlfruitlist = html_entity_decode($fruitList);

		
		
		?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Preserve.it</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <style>
              .carousel-inner > .item > img,
              .carousel-inner > .item > a > img {
              width: 40%;
              margin: auto;
          }
        </style>
    </head>
    <body>
      <div id="background">
        <div id="mySidenav" class="sidenav visible-lg visible-md">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="../index.php">Home</a>
          <a href="#" id="fruit">Fruit</a>
          <div id="items1" class="items">
            <ul>
              <?php echo "$htmlfruitlist"; ?>
			</ul>
          </div>
          <a href="#" id="meat">Meat</a>
          <div id="items2" class="items">
            <ul>
              <li><a href="meats/beef.html">Beef: Steaks</a></li>
              <li><a href="meats/blueberry.html">Beef: Ground</a></li>
              <li><a href="meats/poultry.html">Poultry</a></li>
              <li><a href="meats/fish.html">Fish</a></li>
              <li><a href="meats/pork.html">Pork</a></li>
              <li><a href="meats/egg.html">Egg</a></li>
              <li><a href="meats/sausage.html">Sausage</a></li>
              <li><a href="meats/hotdog.html">Hot Dogs</a></li>
              <li><a href="meats/shrimp.html">Shrimp</a></li>
              <li><a href="meats/bacon.html">Bacon</a></li>
              <li><a href="meats/oyster.html">Oyster</a></li>
            </ul>
          </div>
          <a href="#" id="vegetable">Vegetables</a>
          <div id="items3" class="items">
            <ul>
              <li><a href="#">Item</a></li>
            </ul>
          </div>
          <a href="#" id="dairy">Dairy</a>
          <div id="items4" class="items">
            <ul>
              <li><a href="#">Item</a></li>
            </ul>
          </div>
          <a href="#" id="grain">Grains</a>
          <div id="items5" class="items">
            <ul>
              <li><a href="#">Item</a></li>
            </ul>
          </div>
            <a href="affiliated/apps.php" id="affiliated">Affiliated Apps</a>
        </div>
        <span id="open" onclick="openNav()" class="visible-lg visible-md">&#9776;</span>
        
        <nav class="navbar topnav visible-sm visible-xs">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle topnavButton" data-toggle="collapse" data-target="#myNavbar">
                  &#9776;                 
              </button>
              <a class="navbar-brand" href="#">PreservIt</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Fruits <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php echo "$htmlfruitlist"; ?>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Vegetables <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Dairy <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Meats <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Grains <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                  </ul>
                </li>
                  <li class="">
                    <a href="affiliated/apps.php">Affiliated Apps</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
              <div id="imaginary_container">
                  <div class="input-group stylish-input-group">
					<form action="item.php" method = "GET">
						<input type="text" class="form-control"  placeholder="Search" name="squery" >
					</form>
                      <span class="input-group-addon">
                          <button type="submit">
                              <image src="../image/search2.png" width="15" height="15" alt="submit">
                          </button>
                      </span>
                  </div>
              </div>
          </div>
      	</div>

        <script>
          $('#fruit').click(function() {
            if ($('#items1').is(":visible") == false) {
              $('#items2').hide("slow");
              $('#items3').hide("slow");
              $('#items4').hide("slow");
              $('#items5').hide("slow");
              $('#items1').show("slow");
              document.getElementById("mySidenav").style.width = "150px";
            } else if($('#items1').is(":visible") == true) {
              $('#items1').hide("slow");
            }
          });

          $('#meat').click(function() {
            if ($('#items2').is(":visible") == false) {
              $('#items1').hide("slow");
              $('#items3').hide("slow");
              $('#items4').hide("slow");
              $('#items5').hide("slow");
              $('#items2').show("slow");
              document.getElementById("mySidenav").style.width = "150px";
            } else if($('#items2').is(":visible") == true) {
              $('#items2').hide("slow");
            }
          });

          $('#vegetable').click(function() {
            if ($('#items3').is(":visible") == false) {
              $('#items2').hide("slow");
              $('#items1').hide("slow");
              $('#items4').hide("slow");
              $('#items5').hide("slow");
              $('#items3').show("slow");
              document.getElementById("mySidenav").style.width = "150px";
            } else if($('#items3').is(":visible") == true) {
              $('#items3').hide("slow");
            }
          });

          $('#dairy').click(function() {
            if ($('#items4').is(":visible") == false) {
              $('#items2').hide("slow");
              $('#items3').hide("slow");
              $('#items1').hide("slow");
              $('#items5').hide("slow");
              $('#items4').show("slow");
              document.getElementById("mySidenav").style.width = "150px";
            } else if($('#items4').is(":visible") == true) {
              $('#items4').hide("slow");
            }
          });
          
          $('#grain').click(function() {
            if ($('#items5').is(":visible") == false) {
              $('#items2').hide("slow");
              $('#items3').hide("slow");
              $('#items4').hide("slow");
              $('#items1').hide("slow");
              $('#items5').show("slow");
              document.getElementById("mySidenav").style.width = "150px";
            } else if($('#items5').is(":visible") == true) {
              $('#items5').hide("slow");
            }
          });
        
          function openNav() {
            document.getElementById("mySidenav").style.width = "150px";
          }
          function closeNav() {
            if ($('.items').is(":visible") == true) {
              $('.items').hide("fast");
            }
            document.getElementById("mySidenav").style.width = "0";
          }
        </script>
        <h1><?php echo "$itemName"; ?></h1>
        <div class="container">
            <br>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="PHP VARIABLE HERE" alt="Item 1" width="345" height="258">
                </div>

                <div class="item">
                  <img src="PHP VARIABLE HERE" alt="Item 2" width="345" height="258">
                </div>
              
                <div class="item">
                  <img src="PHP VARIABLE HERE" alt="Item 3" width="345" height="258">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="top: 50%;"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="top: 50%;"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        <div id="<?php echo "$itemName"; ?>">
        <div class="info">
          <div id="<?php echo "$itemName"; ?>">
            <h1><?php echo "$itemName"; ?></h1>
            <div class="row">
              <h3>How to preserve:</h3>
            </div>
            <div class="paragraph">
              <p>
                <?php echo "$howToPreserve"; ?>
              </p>
            </div>
            <div class="row">
              <h3>How to tell if it's going bad</h3>
            </div>
            <div class="paragraph">
              <p>
                <?php echo "$goingBad"; ?>
              </p>
            </div>
            <div class="row">
              <h3>How to save it:</h3>
            </div>
            <div class="paragraph">
              <p>
                <?php echo "$howToSave"; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </body>
	<?php 
	mysql_close($con);
	?>
	
</html>
