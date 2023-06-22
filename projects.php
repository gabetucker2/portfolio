<!DOCTYPE HTML>
<html style = "overflow-y: scroll;">

	<head>
		
		<?PHP require "Prefabs/prefab_core.php"; ?>
		
		<title>Gabe Tucker Portfolio</title>
		
	</head>

	<?PHP require "loadPageAnimation.php"; ?>

    <body style = "background: #FFF;">
		<h1 style = "text-align: center; width: 100%; padding: 2vh 2vh 4vh;"><a class = "red" href = "index.php?return=true"><</a>Projects</h1>

		<p style = "text-align: right; margin-top: -10vh;"><b>NU</b> = needs to be updated; <i>not fully accessible</i></p>
		<p style = "text-align: right;"><b>WIP</b> = work in progress needs updates; <i>accessible</i></p>
		<p style = "text-align: right;"><b>FIN</b> = final or close to final format; <i>accessible</i></p>

		<br/><br/>

        <table>

			<thead><!-- style = "border-style: none none solid; border-color: #000; border-width: 1vh;"-->
				<tr>
					<th>Project</th>
					<th>Front End</th>
					<th>Outline</th>
					<th>What I Learned</th>
					<th>Showcase</th>
					<th>Git</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><b>NIfTI Visualizer</b><br/>Windows Application [Python/nibabel/tkinter/matplotlib]</td>
					<td><img src = "Images/MRIVisualizer.png"></td>
					<td>
						I created a system which allows you to flexibly visualize NIfTI data from the viewpoint of three different axes.  This is compatible with MRI and fMRI scan data.
					</td>
					<td>
						I learned about how MRI scan data is stored digitally and the basics of handling preprocessed NIfTI files for this project. 
					</td>
					<td></td>
					<td><a href = "https://github.com/gabetucker2/nifti-visualizer"><div><p>FIN</p></div></a></td>
				</tr>
			</tbody>

			<tbody>
				<tr>
					<td><b>Muscle Flex Detection-Stimulation</b><br/>Electrical Engineering Project [Arduino]</td>
					<td><img src = "Images/Arduino.jpg"></td>
					<td>
						I have created a system where, using EMG electrodes with a unipolar configuration connected to Arduino software, I am able to reliably detect when a person contracts a given muscle.  I am in the process of implementing a bipolar electrode configuration to improve the signal detection accuracy.  I also made the system capable of stimulating a given muscle using EMS electrodes (I only need a high-power source for this end to be fully complete), and I hope to combine the EMG and EMS systems such that when one person flexes their muscle, another person’s muscle will forcibly contract.
					</td>
					<td>
						I learned about the fundamentals of electrical engineering from this project.  I also learned about different types of electrodes and electrode configurations.
					</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>

			<tbody>
				<tr>
					<td><b>Incontroversion</b><br/>Electron Application [HTML/CSS/NodeJS/JSON]</td>
					<td><img src = "Images/Incontroversion.png"></td>
					<td>
						Incontroversion aims to be the first predicate calculus-based, or first-order logic-based, calculator to perform syntactic derivations.  The user will be able to store any number of premises in the program to construct a domain.  Then, the software will have the ability to detect whether the premises syntactically entail other suppositions, whether they are logically consistent, what other suppositions could be generated from the premises, and so on.  For instance, you could convert everything Plato says to suppositions of predicate calculus, and Incontroversion would detect inconsistencies in how Plato expects people to react to authorities given dishonesty.  It would show a logical proof for why his logic is inconsistent and formalize it in English.  You could do the same to analyze flaws with what a lawyer proposes, to test whether your argument is valid, and so on.  We have finished data storage and translation, and we are currently working on implementing rules for predicate calculus derivations so the program can derive proofs.
					</td>
					<td>
						This project allowed me to work on good practices for coding.  I notated every function with clear JDoc comments, and I modeled an architecture for functions as our basis for our code.  I led a team of 3 working on this project and collaborated using Live Share on VSCode and GitHub.  This also forced me to confront issues abstractly, like optimization techniques, given the nature of the project.
					</td>
					<td><a href = "https://incontroversion.com/"><div><p>NU</p></div></a></td>
					<td><a href = "https://github.com/gabetucker2/Incontroversion"><div><p>WIP</p></div></a></td>
				</tr>
			</tbody>

			<tbody>
				<tr>
					<td><b>OCEAN Type Indicator</b><br/>Website [HTML/CSS/JavaScript/PHP/MySQL]</td>
					<td><img src = "Images/OTI.png"></td>
					<td>
						The Ocean Type Indicator is the first personality type-indicator based off the Big Five (OCEAN) personality traits; it takes the form of a personality test website.  It features pages to convey information, surveys, the main personality test, account handling, a statistics page that allows you to analyze data from the surveys/personality test (the final feature that needs to be fully implemented), a backend statistical analysis and data management tool so we can analyze response patterns to different questions and personality type frequencies and survey responses, an efficient database which allows you to view most past data and all current data regarding user responses, a profile page which shows your percentile in each of the Big Five traits compared to other people, and many other features.  There are many facets to this website that are best explored in its <a href = "https://oceanpersonalities.com/methods.php">methods</a> section.  Lately I have been working with psychologist Dr. Duane Wegener on conducting exploratory factor analysis on our data to test construct validity of our items, and we are submitting an IRB review to receive approval to collect information about test-takers through our surveys for the purposes of research.
					</td>
					<td>
						This project forced me to learn complex data management.  It has nearly 20 tables in the database on the backend which required extensive schematic organization and planning.  It also has forced me to work on implementing software based on its real-world applications, e.g., for research.
					</td>
					<td><a href = "https://oceanpersonalities.com/"><div><p>FIN</p></div></a></td>
					<td></td>
				</tr>
			</tbody>

			<tbody>
				<tr>
					<td><b>Hexagonal Procedural Terrain Generator</b><br/>Unity3D [C#]</td>
					<td><img src = "Images/Utopia.png"></td>
					<td>
						I created this project after learning how to create procedural meshes in Unity3D and after having become interested in the application of perlin noise.  After around 2-3 days of work, I was able to complete the generator's main framework; I began to implement scripts that could understand where tiles were and adjust tile properties which would be useful were the generator to be used in future game development, e.g., for having characters reside on certain tiles or for having pathfinding from tile to tile.  I created a mesh generator from scratch, converted this into a 3D grid, and worked on implementing algebraic algorithms for giving the user maximal flexibility in creating a custom, saveable map given a host of easily-manageable sliders, colors, and seeds to choose from.
					</td>
					<td>
						This project forced me to code very concisely, methodically, and mathematically.  As a result, I had to plan very carefully in advance to understand the abstract concepts underlying the script.
					</td>
					<td><a href = "https://www.youtube.com/watch?v=PsDXM2vL4iI"><div><p>FIN</p></div></a></td>
					<td><a href = "https://github.com/gabetucker2/Utopia"><div><p>FIN</p></div></a></td>
				</tr>
			</tbody>

			<tbody>
				<tr>
					<td><b>2D Game Framework</b><br/>Unity2D [C#]</td>
					<td><img src = "Images/Empire.png"></td>
					<td>
						This project is a 2D game I began working on with a small team; it is custom made from the ground up, including the music and visuals.  It has character customization, data saving (for a runtime building interface I created), a somewhat flimsy backend I created to keep track of data, object collisions and layering, movement, lighting/time of day, pathfinding for NPCs, NPC handling, NPC categories for individuality in appearance and role specialties, and many other small features which were added into the game.  Some of the features are not displayed in the showcase because they are not easy to demonstrate, but the video provided gives a decent idea of what has been created thus far: a framework for a larger future project.  I stopped working on this project once I had my idea for my second project (The OCEAN Type Indicator) because I realized this would take years to finish as well as money to pay a dedicated team of developers.
					</td>
					<td>
						I learned about the fundamentals of creating large projects, e.g., organization from the beginning, leading a team, and most importantly, clearly conveying what exactly it is that you're aiming to achieve.  I also learned about the fundamentals of Unity game (and especially 2D game) development and strengthened my skills in C#.
					</td>
					<td><a href = "https://www.youtube.com/watch?v=QXx_Hj7KAbs"><div><p>FIN</p></div></a></td>
					<td></td>
				</tr>
			</tbody>

		</table>

		<br/><br/>

		<h1 style = "text-align: center; width: 100%; padding: 2vh 2vh 4vh;"><a class = "red" href = "index.php?return=true"><</a>Mathematical Models</h1>

		<p style = "text-align: right; margin-top: -10vh;">I created two open-source algorithms for flexibly computing point extrusions.</p>

		<br/><br/>

        <table style = "width: 100%;">

			<thead><!-- style = "border-style: none none solid; border-color: #000; border-width: 1vh;"-->
				<tr>
					<th>Model</th>
					<th>Picture</th>
					<th>Showcase</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><b>Point Extrusion: Linear Function</b></td>
					<td><img src = "Images/LinearExtrusion.png"></td>
					<td><a href = "https://www.desmos.com/calculator/5nzj5beddi"><div><p>FIN</p></div></a></td>
				</tr>
			</tbody>

			<tbody>
				<tr>
					<td><b>Point Extrusion: Arc Function</b></td>
					<td><img src = "Images/ArcExtrusion.png"></td>
					<td><a href = "https://www.desmos.com/calculator/5uiztk7yyy"><div><p>FIN</p></div></a></td>
				</tr>
			</tbody>

		</table>

		<br/><br/>

		<a href = "index.php?return=true" class = "red" style = "width: 100%;">RETURN</a>

		<br/><br/>

    </body>

</html>
