<!DOCTYPE HTML>
<html style = "overflow-y: hidden;">

	<head>
		
		<?PHP require "Prefabs/prefab_core.php"; ?>
		
		<title>Gabe Tucker Portfolio</title>
		
	</head>
	
	<body class = "blackOut">
		
		<div id = "main" style = "width: 200vw; margin-left: 0vw;">
			
			<div id = "home" class = "container" style = 'background: #000000;'>
				
				<?PHP
					
					//TITLE TEXT
					$title = "gabe tucker portfolio";
					echo "<h1 class = 'white' style = 'margin: 47.5vh 0 0 10vw; position: absolute;'>";
					$letterSpacingMin = 0.1;
					$letterSpacingMax = 0.3;
					$letterSpacingMult = 15;
					for ($l = 0; $l < strlen($title); $l++) {
						$i = $l / strlen($title);//i is normalized l from 0 to 1
						$thisSpacing = $letterSpacingMult * ($letterSpacingMin + $i*($letterSpacingMax - $letterSpacingMin));
						echo "<span style = 'letter-spacing: {$thisSpacing}vh;'>" . $title[$l] . "</span>";
					}
					echo "</h1>";
					
				?>
								
				<!--ARROW BUTTON-->
				<image id = 'arrowButton' src = 'Images/ArrowRight.png' style = 'position: absolute; height: 10vh; width: auto; margin: 45vh 0 0 75vw;' ondragstart = 'return false;' onmousedown = 'NextButtonClick();'></image>
				
			</div>

			<?PHP
				$returnToHomePage = $_GET["return"] ?? false;

				if ($returnToHomePage == true) {
					echo "<script>let returning = true;</script>";
					echo "<script>
						let bls = document.getElementsByClassName('blocker');
						for (const bl of bls) {
							bl.style.transitionDuration = '0.1s';
						}
					</script>";
				} else {
					echo "<script>let returning = false;</script>";
				}

				echo "<script>let timeMultiplier = " . ($returnToHomePage ? "0.01" : "1") . ";</script>";
			?>
			
			<div id = "welcome" class = "container" style = 'background: #FFFFFF;'>

				<!--MOUSEY-->
				<image src = "Images/Mousey.png" id = "mousey" style = "width: 5vw; height: 5vw; position: absolute; z-index: 1000; pointer-events: none; transform: translate(47.5vw, 102.5vh) rotate(0deg);"></image>
				<!--TRAIL-->
				<?PHP
					for ($i = 0; $i < 15; $i++) {
						echo '<image src = "Images/Trail.png" class = "trail" style = "width: 5vw; height: 5vw; position: absolute; z-index: 500; filter: invert(50%); transform: translate(999vw, 999vh) rotate(0deg);"></image>';
					}
				?>
				
				
				<h1 style = 'margin: 47.5vh 0 0 50vw; position: absolute; z-index: 100;'>welcome to my portfolio</h1>

				<!--For the text to hide behind when it comes out initially-->
				<div id = "blocker" <?PHP echo $returnToHomePage ? 'class = "blocker actualized"' : 'class = "blocker inhibited"'; ?> style = "z-index: 10; position: absolute;"></div>
				
				<ul id = "pagesList" style = "width: 30vw; height: 50vh; top: 25vh; margin: 0; position: absolute; z-index: 1;">
					
					<?PHP
						$thesePages = array("experience", "about_me", "projects", "artistic", "skills");
						for ($i = 0; $i < 5; $i++) {
							echo '<li '.($returnToHomePage ? 'class = "completed"' : 'class = "hidden"').' onmousedown = "PageButtonClicked(\'' . $thesePages[$i] . '\', ' . $i . ');">' . str_replace("_", " ", $thesePages[$i]) . '</li>';
						}
					?>
					
				</ul>

				<!--Transition gradient effect-->
				<div id = "circleInDiv" style = "z-index: 1500; position: absolute; width: 200vw; height: 200vh;"></div>

			</div>
			
		</div>
		
		<script>
			
			let mainDiv, homeDiv, welcomeDiv, blockerDiv, pagesList, mousey, trails, circleInDiv;
			let isTransitioning = false;
			let isOnMainPage = false;
			let i;

			//reload page on forward/back-button traversal
			window.addEventListener("pageshow", function(e) {
				let historyTraversal =
					e.persisted ||
						(typeof window.performance != "undefined" &&
						window.performance.navigation.type === 2 );
				
				if (historyTraversal) {
					window.location.reload();
				}
			});
			
			function SetDefaultNextButton()
			{
				arrowButton.style.margin = "45vh 0 0 75vw";
				arrowButton.style.height = "10vh";
				arrowButton.style.cursor = "default";
			}

			function PageButtonClicked(newPageName, offset) {
				console.log('click');
				if(!isTransitioning) {
					console.log('pass');
					isTransitioning = true;
					circleInDiv.style.margin = (-70 + 10*offset) + "vh 0 0 -78vw";
					
					let i = 0;
					thisInterval = setInterval(function() {
						i += 100 / transitionIterations;//0 to 100 linear
						let j = i / 100;//0 to 1 linear
						let k = -((j - 1)*(j - 1)) + 1;//0 to 1 exponential convex
						let l = k * 100;//0 to 100 exponential convex
						let m = l * (255 / 100);//0 to 255 exponential convex

						//inner-most to outer-most
						let newLocation = 100 - l;

						circleInDiv.style.background =
							'radial-gradient(transparent ' + newLocation + '%, rgb(255, ' + m + ', ' + m + ') ' + newLocation + '%)';
						
						//set isTransitioning = false on final
						if (j >= 1) {
							isTransitioning = false;
							clearInterval(thisInterval);
							window.location.href = newPageName + ".php";
						}

					}, (transitionSeconds * 1000 * timeMultiplier) / transitionIterations);
				}
			}
			
			function NextButtonClick(skip) {
				if(!isTransitioning) {
					isTransitioning = true;
					SetDefaultNextButton();
					
					//set random gradients
					secondGradString = secondGradStringPresets[Math.floor(Math.random() * secondGradStringPresets.length)];
					
					let i = 0;
					thisInterval = setInterval(function() {
						i += 100 / transitionIterations;//0 to 100 linear
						let j = i / 100;//0 to 1 linear
						let k = -((j - 1)*(j - 1)) + 1;//0 to 1 exponential convex
						let l = k * 100;//0 to 100 exponential convex
						
						mainDiv.style.marginLeft = -l*k*k*k*k*k + "vw";
						
						homeDiv.style.background = 'linear-gradient(to left, #00000000 ' + l*k*k + '%, #000000 0%), linear-gradient(to bottom, ' + secondGradString + ')';
						
						//final interval of gradient transition
						if(j >= 1) {
							isOnMainPage = true;
							clearInterval(thisInterval);

							mainDiv.style.marginLeft = "-100vw";
							

							//open line on next page
							let st = 1;
							let each = 1;
							if (returning == false) {
								st = 500;
								each = 200;
							}

							setTimeout(function() {
								blockerDiv.classList.remove("inhibited");
								blockerDiv.classList.add("actualized");

								//tween options from blocker
								numChildren = pagesList.children.length;
								c = 0;
								thisInterval = setInterval(function() {
									pagesList.children[c].classList.remove("hidden");
									c++;

									if(c == pagesList.children.length) {
										clearInterval(thisInterval);

										setTimeout(function() {
											Array.prototype.forEach.call (pagesList.children, child => {
												child.classList.add("completed");
												isTransitioning = false;
											});
										}, 1000 * timeMultiplier);//1000 is 1s for transition time
									}
								}, each);
							}, st);
						}
					}, (transitionSeconds * 1000 * timeMultiplier) / transitionIterations);
				}
			}

			//set mousey agenda
			let currentAgenda = 0, agendaPosX = 0, agendaPosY = 0, agendaMaxSeconds = 10, thisNormalReturnTimeout;
			function UpdateAgenda(a, x, y) {
				currentAgenda = a;
				agendaPosX = x;
				agendaPosY = y;

				clearTimeout(thisNormalReturnTimeout);
				thisNormalReturnTimeout = setTimeout(function() {
					if (currentAgenda != 0) {
						UpdateAgenda(0, 0, 0);
					}
				}, agendaMaxSeconds * 1000);
			}
			
			window.onload = function() {
				
				//fade in from black effect home page
				document.body.classList.remove("blackOut");

				//other stuff
				mainDiv = document.getElementById("main");
				homeDiv = document.getElementById("home");
				welcomeDiv = document.getElementById("welcome");
				blockerDiv = document.getElementById("blocker");
				pagesList = document.getElementById("pagesList");
				mousey = document.getElementById("mousey");
				trails = document.getElementsByClassName("trail");
				circleInDiv = document.getElementById("circleInDiv");

				let x = 0, y = 0;
				
				let arrowButton = document.getElementById("arrowButton");
				let arrowButtonX, arrowButtonY;
				let arrowButtonGlowDistance = 100;
				
				let prevX = 0, prevY = 0;
				
				//update arrow button position
				function UpdateArrowButtonPos()
				{
					arrowButtonX = arrowButton.getBoundingClientRect().left + arrowButton.getBoundingClientRect().width/2;//center
					arrowButtonY = arrowButton.getBoundingClientRect().top + arrowButton.getBoundingClientRect().height/2;//center
				}
				
				UpdateArrowButtonPos();
				
				window.onresize = function() {
					UpdateArrowButtonPos();
				};
				
				//whether mouse is close to arrow button
				document.onmousemove = function(e) {
					x = e.clientX, y = e.clientY;
					
					//arrow button
					if (ReturnHypotenuse(x, arrowButtonX, y, arrowButtonY) < arrowButtonGlowDistance && !isTransitioning)//if in arrowButtonGlowDistance range
					{
						arrowButton.style.margin = "44.5vh 0 0 74.5vw";
						arrowButton.style.height = "11vh";
						arrowButton.style.cursor = "pointer";
					}
					else
					{
						SetDefaultNextButton();
					}
					
					prevX = e.clientX; prevY = e.clientY;
				};

				document.onmousedown = function(e) {
					if (isOnMainPage) {
						UpdateAgenda(1, x*100 / document.body.scrollWidth, y*100 / document.body.scrollHeight);
					}
				};

				//mousey update
				let startMouseyTop = 100, startMouseyLeft = 52.5;
				let mouseyRotationActual = 0, mouseyRotation360 = 0, mouseyTop = startMouseyTop, mouseyLeft = startMouseyLeft;
				let maxRotationInStep = 80, forwardMoveLength = 5, clickDistThreshold = 15;
				let step = 0;
				let needsToRotate = 0;
				let trailIteration = 0;

				function CheckAgenda(a, mouseyProjectedPosX, mouseyProjectedPosY) {
					mouseyProjectedPosY = 100 - mouseyProjectedPosY;//makes it start at the bottom and go to the top

					function IsInBox() {
						return !(mouseyProjectedPosX < 27.5 || mouseyProjectedPosX > 97.5 || mouseyProjectedPosY < 5 || mouseyProjectedPosY > 100);
					}
					
					switch (a) {
						case 0://stay in start box
							return (!IsInBox());
						case 1:
							let closestRotOffset = 180;
							let closestRaycast = Number.MAX_VALUE;
							
							for (let i = 0; i <= 10; i++) {
								let thisRotOffset = ((i / 10)+Math.random())*maxRotationInStep*2 - maxRotationInStep;
								let thisRotation360 = mouseyRotation360 + thisRotOffset;
								if (thisRotation360 >= 360) { thisRotation360 -= 360; }
								else if(thisRotation360 < 0) { thisRotation360 += 360; }
								let localMouseyLeft = mouseyLeft + (forwardMoveLength * Math.sin(thisRotation360 * (Math.PI / 180)));
								let localMouseyTop = mouseyTop + -(forwardMoveLength * Math.cos(thisRotation360 * (Math.PI / 180)));
								
								let raycastMagnitude = (localMouseyLeft - agendaPosX)*(localMouseyLeft - agendaPosX) + (localMouseyTop - agendaPosY)*(localMouseyTop - agendaPosY);
								if (raycastMagnitude < closestRaycast) {
									closestRaycast = raycastMagnitude;
									closestRotOffset = thisRotOffset;
								}
							}

							//if at target, set to center of map so it gets out of weird ranges
							if ((mouseyLeft - agendaPosX)*(mouseyLeft - agendaPosX) + (mouseyTop - agendaPosY)*(mouseyTop - agendaPosY) < clickDistThreshold)
							{
								if ((agendaPosX == 50 && agendaPosY == 50) || (!(agendaPosX == 50 && agendaPosY == 50) && IsInBox())) {//already at center map or in box, set to normal
									UpdateAgenda(0, 0, 0);
								} else {//needs to be reset to center
									UpdateAgenda(1, 60, 50);
								}
							}
							
							return closestRotOffset;
					}
				}

				setInterval(function() {
					if (isOnMainPage) {
						//forwards projections
						let localMouseyLeft = mouseyLeft + (forwardMoveLength * Math.sin(mouseyRotation360 * (Math.PI / 180)));
						let localMouseyTop = mouseyTop + -(forwardMoveLength * Math.cos(mouseyRotation360 * (Math.PI / 180)));
						
						switch (step) {
							case 0://move forward

								//create trail
								trails[trailIteration].style.transform = "translate(" + mouseyLeft + "vw, " + mouseyTop + "vh) rotate(" + mouseyRotationActual + "deg)";
								trailIteration++;
								if (trailIteration == trails.length) {
									trailIteration = 0;
								}
								
								//update mouse
								if (currentAgenda == 0 && CheckAgenda(currentAgenda, localMouseyLeft, localMouseyTop)) {
									needsToRotate++;
									
									mouseyLeft += ((forwardMoveLength/Math.pow(2, needsToRotate+1)) * Math.sin(mouseyRotation360 * (Math.PI / 180)));
									mouseyTop += -((forwardMoveLength/Math.pow(2, needsToRotate+1)) * Math.cos(mouseyRotation360 * (Math.PI / 180)));
									
									if(needsToRotate > 10) {
										mouseyLeft = startMouseyLeft;
										mouseyTop = startMouseyTop;
										mouseyMRotation360 = 0;
										mouseyMRotationActual = 0;
										needsToRotate = 0;
									}

									break;
								} else {
									mouseyLeft = localMouseyLeft;
									mouseyTop = localMouseyTop;
									needsToRotate = 0;
								}
								
								break;
							case 1://rotate
								let rotMult = 1;
								if (needsToRotate != 0) {
									rotMult = 1.5;
								}
								
								let randomRotOffset;
								
								if (currentAgenda == 1) {
									randomRotOffset = CheckAgenda(currentAgenda, localMouseyLeft, localMouseyTop);
								} else {
									randomRotOffset = Math.random()*maxRotationInStep*2 - maxRotationInStep;
								}
								
								mouseyRotationActual = Math.floor(mouseyRotationActual / 360)*360 + (mouseyRotation360*rotMult) + randomRotOffset;
								mouseyRotation360 = mouseyRotation360*rotMult + randomRotOffset;
								if (mouseyRotation360 >= 360) { mouseyRotation360 -= 360; }
								else if(mouseyRotation360 < 0) { mouseyRotation360 += 360; }

								step = -1;
								break;
						}

						mousey.style.transform = "translate(" + mouseyLeft + "vw, " + mouseyTop + "vh) rotate(" + mouseyRotationActual + "deg)";

						step++;
					}
				}, 100);

			};

			if (returning) {
				NextButtonClick();
			}
			
		</script>
		
	</body>

</html>
