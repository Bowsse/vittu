<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- jquery -->
	<script src="scripts/indexScript.js"></script> <!-- index.php soittolistan nappiscriptit -->
	<script src="scripts/YTPlayerScript.js"></script> <!-- index.php YouTube-soittimen scriptit -->
<?php
if($_SESSION["user_name"] == "admin") {?>
<script src="scripts/adminScripts.js"></script> <!-- adminin käyttämät scriptit --><?php 
}
?>

	<script language="JavaScript" type="text/javascript">

	function login(showhide){
	if(showhide == "show"){
	    document.getElementById('popupbox').style.visibility="visible";
		}else if(showhide == "hide"){
		    document.getElementById('popupbox').style.visibility="hidden"; 
		}
	}
	</script>
	</head>				      
<body>

<?php include_once("includes/nav.php");
 ?> <!-- header ja navigointilinkit -->

<main>
	<!-- sivun vasen puoli -->
	<section>
		<!-- YouTube-soittimen div -->
			<div class="wrapper">
				<div id="player"></div>
			</div>
		<!-- YouTube-soittimen napit -->
			<article id=playerButtons>
				<button class="playerButton" id="play" onclick="playVideo()">Play</button><button class="playerButton" id="skip" onclick="adminChangeVideo('skip')">Skip</button><button class="playerButton" id="mute" onclick="muteVideo()">Mute</button><input id="volume" type=range min="0" max="100" value=100 oninput="changeVolume(this.value)">
			</article>
		<!-- Uuden kappaleen lisäyslomake -->


			<article>
				<ul class="tab">
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Lisää')" id="defaultOpen">Lisää kappale</a>
					</li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'chat')">chat</a></li>

			<?php
			    if($_SESSION["user_name"] == "admin") { 
			    ?>
			        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'info')">info</a></li>
			    <?php } else { ?>
			        
			    <?php
			    }
			?>

				</ul>

				<div id="Lisää" class="tabcontent">
					<input type="text" id="videoUrl" name="videoUrl" placeholder="https://www.youtube.com/watch?v=1yhTaFQJukx" onInput="getData(this.value)"><button onclick="addVideo()">>></button>
					<br><p>Title: <span id=videoTitle name=videoTitle></span></p>
					<p>Channel: <span id=channelTitle name=channelTitle></span></p>
				</div>

				<div id="chat" class="tabcontent">
				  <div id="mastercontainer">
				</p>    <div id="container"></div>

					<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
				    <script src="https://unpkg.com/react@15.3.2/dist/react.js"></script>
				    <script src="https://unpkg.com/react-dom@15.3.2/dist/react-dom.js"></script>
				    <script src="https://unpkg.com/babel-core@5.8.38/browser.min.js"></script>
				    <script type="text/babel" src="scripts/react-chat.js"></script>

			</div>
				</div>
			<?php
			    if($_SESSION["user_name"] == "admin") { 
			    ?>
			    <div id="info" class="tabcontent">
					<h1>
					<?php
					echo 'Moi oot ' . $_SESSION['user_name'] . ', tällähetkellä ainoot sessionin varit on  $_SESSION["user_name"] = ' . $_SESSION['user_name'] . ', $_SESSION["user_email"] = ' . $_SESSION['user_email'] . ' ja $_SESSION["user_is_logged_in"] = ' . $_SESSION['user_is_logged_in'] . '.<br/><br/>';
				    ?>
					</h1>
			    </div>
			    <?php } else { ?>
			        
			    <?php
			    }
			?>
			</article>
	</section>
	<!-- sivun oikea puoli -->
	<!-- soittolista -->
		<aside id="playlist"></aside>
	<button id="playlistButton" onclick="closeList()">Close</button> <!-- soittolistan nappi -->
		
</main>

<?php include_once("includes/footer.php"); ?> <!-- footer -->
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
