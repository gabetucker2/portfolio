<!DOCTYPE HTML>
<html style = "overflow-y: hidden;">

	<head>
		
		<?PHP require "Prefabs/prefab_core.php"; ?>
		
		<title>LAB: Fourier</title>
		
	</head>
	
	<body>
		
		<svg id = "svg" width = "750" height = "750" style = "border-style: solid;">

			<path id = "letter" fill = "none" stroke = "#000" style = "transform: scale(4.5)"/>

		</svg>

		<script>

			const svgData = "m51.688 5.25c-5.427-0.1409-11.774 12.818-11.563 24.375 0.049 3.52 1.16 10.659 2.781 19.625-10.223 10.581-22.094 21.44-22.094 35.688-0.163 13.057 7.817 29.692 26.75 29.532 2.906-0.02 5.521-0.38 7.844-1 1.731 9.49 2.882 16.98 2.875 20.44 0.061 13.64-17.86 14.99-18.719 7.15 3.777-0.13 6.782-3.13 6.782-6.84 0-3.79-3.138-6.88-7.032-6.88-2.141 0-4.049 0.94-5.343 2.41-0.03 0.03-0.065 0.06-0.094 0.09-0.292 0.31-0.538 0.68-0.781 1.1-0.798 1.35-1.316 3.29-1.344 6.06 0 11.42 28.875 18.77 28.875-3.75 0.045-3.03-1.258-10.72-3.156-20.41 20.603-7.45 15.427-38.04-3.531-38.184-1.47 0.015-2.887 0.186-4.25 0.532-1.08-5.197-2.122-10.241-3.032-14.876 7.199-7.071 13.485-16.224 13.344-33.093 0.022-12.114-4.014-21.828-8.312-21.969zm1.281 11.719c2.456-0.237 4.406 2.043 4.406 7.062 0.199 8.62-5.84 16.148-13.031 23.719-0.688-4.147-1.139-7.507-1.188-9.5 0.204-13.466 5.719-20.886 9.813-21.281zm-7.719 44.687c0.877 4.515 1.824 9.272 2.781 14.063-12.548 4.464-18.57 21.954-0.781 29.781-10.843-9.231-5.506-20.158 2.312-22.062 1.966 9.816 3.886 19.502 5.438 27.872-2.107 0.74-4.566 1.17-7.438 1.19-7.181 0-21.531-4.57-21.531-21.875 0-14.494 10.047-20.384 19.219-28.969zm6.094 21.469c0.313-0.019 0.652-0.011 0.968 0 13.063 0 17.99 20.745 4.688 27.375-1.655-8.32-3.662-17.86-5.656-27.375z";

			const range = 3;
			const tMax = 2;
			const frames = 100;

			const startX = 375;
			const startY = 375;

			let t = 0; // time elapsed since start of drawing in seconds
			let ui_t = 0; // time elapsed since start of drawing in the unit interval


			const pointArray = []; // filled to 2(range) + 1

			const s_intervalTime = tMax / frames; // time in s between each update

			const fouriers = [];
			for (let n = -range; n <= range; n++) { fouriers.push({}); } // fill with 2(range) + 1 empty objects

			
			const e_path = document.getElementById("letter");
			const e_svg = document.getElementById("svg");

			const updateInterval = null;

			function createVector(n) {

				let vec = {};

				const fourier = fouriers[n + range];

				const raw_vec = fourier.c * Complex.exp(n * 2 * Math.PI * ui_t);
				
				vec.x = raw_vec.re;
				vec.y = raw_vec.im;

				return vec;

			}

			function getFourierConstant(n) {

				//c_n = integral t1, t2 [f(t)(e ^ -n*2pi*i*t)(dt)]
				//raw_vec average of sum is f(t)

				let constant = 0;

				const point = pointArray[n + range];

				//TODO: fill

				return constant;

			}


			function createElementSVG(type) {

				return document.createElementNS("http://www.w3.org/2000/svg", type);

			}

			function visualizeFourier(fourier) {

				const arrow = fourier.arrow;
				const _arrow = fourier._arrow;
				const circle = fourier.circle;
				const _circle = fourier._circle;

				arrow.setAttribute("x1", _arrow.x1);
				arrow.setAttribute("y1", _arrow.y1);
				arrow.setAttribute("x2", _arrow.x2);
				arrow.setAttribute("y2", _arrow.y2);
				arrow.setAttribute("stroke", "#000");
				arrow.setAttribute("stroke-width", 2);

				circle.setAttribute("cx", _circle.cx);
				circle.setAttribute("cy", _circle.cy);
				circle.setAttribute("r", _circle.r);
				circle.setAttribute("stroke", "#000");
				circle.setAttribute("stroke-width", 3);
				circle.setAttribute("fill", "none");

			}

			function setFourierVector(n) {

				const fourier = fouriers[n + range];
				const vec = fourier.vec;
				
				const newVector = createVector(n);

				vec.x = newVector.x;
				vec.y = newVector.y;

			}

			function updateFouriers() {

				let workingVectorSum = {x: 0, y: 0};
			
				for (let i = 0; i <= range; i++) {

					for (let b = 0; b <= 1; b++) {

						const n = i * (b == 0 ? 1 : -1); // n = 0, 1, -1, 2, -2, 3, -3, ..., -range, range

						const fourier = fouriers[n + range];
						const vec = fourier.vec;

						setFourierVector(n);

						const _arrow = fourier._arrow;
						_arrow.x1 = (i == 0 ? startX : workingVectorSum.x);
						_arrow.y1 = (i == 0 ? startY : workingVectorSum.y);
						_arrow.x2 = _arrow.x1 + vec.x;
						_arrow.y2 = _arrow.y1 + vec.y;

						const _circle = fourier._circle;
						_circle.cx = _arrow.x1;
						_circle.cy = _arrow.y1;
						_circle.r = Math.hypot(_arrow.x2 - _arrow.x1, _arrow.y2 - _arrow.y1);

						visualizeFourier(fourier);

						workingVectorSum.x += vec.x;
						workingVectorSum.y += vec.y;

						if (i == 0) {
							b++; // make it only run the b loop once iff i == 0
						}

					}

				}

				// TODO: draw shape to vector sum

				t += s_intervalTime;
				ui_t = t / tMax;

			}


			window.onload = () => {
				
				e_path.setAttribute("d", svgData);

				let workingVectorSum = {x: 0, y: 0};
			
				for (let i = 0; i <= range; i++) {

					for (let b = 0; b <= 1; b++) { // initialize fourier properties

						const n = i * (b == 0 ? 1 : -1); // n = 0, 1, -1, 2, -2, 3, -3, ..., -range, range

						const fourier = fourier[n + range];

						fourier.n = n;
						fourier.c = getFourierConstant(n);
						fourier.vec = {};

						const arrow = createElementSVG("line");
						fourier.arrow = arrow;
						e_svg.appendChild(arrow);
						fourier._arrow = {};

						const circle = createElementSVG("circle");
						fourier.circle = circle;
						e_svg.appendChild(circle);
						fourier._circle = {};

						if (i == 0) {
							b++; // make it only run the b loop once iff i == 0
						}

					}

				}

				updateFouriers();

				for (let f = 0; f < frames; f++) {
					
					const point = {};

					const unit_currentDelta = (f + 1) / frames; // f fit to [0, 1]
					const finalDelta = e_path.getTotalLength();
					const currentPoint = e_path.getPointAtLength(unit_currentDelta * finalDelta);

					point.x = currentPoint.x;
					point.y = currentPoint.y;

					pointArray.push(point);

				}

				updateInterval = window.setInterval(updateFouriers(), s_intervalTime * 1000);

			};

		</script>
		
	</body>

</html>
