<!DOCTYPE HTML>
<html style = "overflow-y: hidden;">

	<head>
		
		<?PHP require "Prefabs/prefab_core.php"; ?>
		
		<title>Gabe Tucker Portfolio</title>
		
	</head>

	<style>

		div {
			width: 60%;
			margin-left: 20%;
			overflow-y: scroll;
		}

		div > * {
			width: 100%;
		}

	</style>

	<?PHP require "loadPageAnimation.php"; ?>

    <body style = "background-color: #FFF;">
		
		<div>
			<img src = "Images/CV Portfolio_Page_1.png">
			<br>
			<img src = "Images/CV Portfolio_Page_2.png">
			<br>
			<img src = "Images/CV Portfolio_Page_3.png">
			<br>
			<img src = "Images/CV Portfolio_Page_4.png">
		</div>

		<br/><br/>

		<a href = "index.php?return=true" class = "red" style = "width: 100%;">RETURN</a>

    </body>

</html>
