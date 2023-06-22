<!DOCTYPE HTML>
<html>

	<head>
		
		<?PHP require "Prefabs/prefab_core.php"; ?>
		
		<title>Gabe Tucker Portfolio</title>
		
	</head>

	<?PHP require "loadPageAnimation.php"; ?>

    <body style = "background: #FFF;">

		<h1 style = "text-align: center; width: 100%; padding: 2vh 2vh 0;"><a class = "red" href = "index.php?return=true"><</a>Skills</h1>

		<br/>

		<p style = "text-align: center;">Click and drag to rotate the sphere</p>

		<br/><br/>

		<?PHP

			$text = array("PHP", "Lua", "JavaScript", "C#", "Python", "MATLAB", "R", "Java", "MySQL", "HTML", "CSS", "0th/1st Order Logic", "Infinitesimal Calculus", "Lambda Calculus", "JSON", "XML", "Sabre Fencer", "Piano", "Drawing", "Shell Scripting", "Roblox Studio", "Electron", "Game Dev", "phpMyAdmin", "Unity2D", "CITI Training", "JASP", "NodeJS", "GitHub", "Eclipse", "Visual Studio/VSCode", "Retired Black Belt", "Expert Text Sphere Maker", "Web Dev", "Data Management", "Chess");
			echo '<script>let textElements = [];</script>';

			for ($i = 0; $i < count($text); $i++) {
				echo '<p class = "sphere" id = "sphere'.$i.'">'.$text[$i].'</p>';
				echo '<script>textElements.push(document.getElementById("sphere'.$i.'"));</script>';
			}

		?>
		
		<!--Make space-->
		<div style = "width: 35vw; height: 35vw; margin-left: 32.5vw; margin-bottom: 2vh;"></div>

		<a href = "index.php?return=true" class = "red" style = "width: 100%;">RETURN</a>

		<br/><br/>
    </body>

	<script>

		const mouseStartPos = {x: 0, y: 0}, mouseCurrentPos = {x: 0, y: 0};//x, y
		const RADIUS = 15;
		const xOffset = `50vw`, yOffset = `18vw`;
		const magnitudeMultiplier = 0.005;
		const MAGNITUDE = {x: -1, y: -1};
		const prevMouseStart = {x: 0, y: 0};
		let mouseDown = false;

		/**
		 * min: (-inf, max]
		 * max: [min, 1]
		 * val: [0, 1]
		 */
		 function LERP (min, max, val) {//y = (max - min)val + min
			return (max - min)*val + min;
		}

		function UpdateCircle(cx, cy) {

			mouseCurrentPos.x = cx;
			mouseCurrentPos.y = cy;
			MAGNITUDE.x = (mouseStartPos.x - mouseCurrentPos.x)*magnitudeMultiplier;
			MAGNITUDE.y = (mouseCurrentPos.y - mouseStartPos.y)*magnitudeMultiplier;
			prevMouseStart.x = mouseStartPos.x - mouseCurrentPos.x;
			prevMouseStart.y = mouseStartPos.y - mouseCurrentPos.y;

			let BASEYAW = MAGNITUDE.x, BASEPITCH = MAGNITUDE.y;

			let LEGSIZE = 0;
			while (LEGSIZE*LEGSIZE < textElements.length) {
				LEGSIZE ++;
			}

			for (let yawOffset = 0; yawOffset < LEGSIZE; yawOffset++) {
				for (let pitchOffset = 0; pitchOffset < LEGSIZE; pitchOffset++) {

					const elementID = yawOffset*LEGSIZE + pitchOffset;

					if (elementID < textElements.length) {
						let textElement = textElements[elementID];

						//yawOffset pitchOffset is 2D c/c grid
						let THISYAW = BASEYAW + yawOffset, THISPITCH = BASEPITCH + pitchOffset;
						let POINT = {
							x: Math.cos(THISYAW),//-1 to 1
							y: (Math.sin(THISYAW)*Math.cos(THISPITCH) * 0.5) + 0.5,//0 to 1
							z: Math.sin(THISYAW)*Math.sin(THISPITCH)//-1 to 1
						};

						textElement.style.transform = `translate(calc(${(POINT.x * RADIUS)}vw + ${xOffset}), calc(${(POINT.z * RADIUS)}vw + ${yOffset}))`;//x/z

						textElement.style.fontSize = `${LERP(0.2, 1, POINT.y) * 1.5}rem`;

						textElement.style.color = `rgba(0, 0, 0, ${LERP(-0.8, 1, POINT.y)})`;
					}

				}
			}

		}

		UpdateCircle(0, 0);

		document.onmousedown = function(e) {

			mouseStartPos.x = e.clientX + prevMouseStart.x;
			mouseStartPos.y = e.clientY + prevMouseStart.y;
			mouseDown = true;

		}
		document.onmouseup = function() {

			mouseDown = false;

		}
		document.onmousemove = function(e) {
			
			if (mouseDown) {
				UpdateCircle(e.clientX, e.clientY);
			}

		}

	</script>

</html>
