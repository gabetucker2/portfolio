<?PHP

    echo '
        <!--Transition gradient effect-->
        <div id = "circleOutDiv" style = "z-index: 1500; position: absolute; width: 200vw; height: 200vh; background: #FFF;"></div>

        <script>
            window.onload = function() {

                let circleOutDiv = document.getElementById("circleOutDiv");

                //outer circle animation
                
                let i = 0;
                thisInterval = setInterval(function() {
                    i += 100 / transitionIterations;//0 to 100 linear
                    let j = i / 100;//0 to 1 linear
                    let k = -((j - 1)*(j - 1)) + 1;//0 to 1 exponential convex
                    let l = k * 100;//0 to 100 exponential convex

                    //outer-most to inner-most
                    var newLocation = l;
                    circleOutDiv.style.background = "radial-gradient(transparent " + newLocation + "%, #FFF " + newLocation + "%)";
                    
                    //set istransitioning = false on final
                    if (j >= 1) {
                        clearInterval(thisInterval);
                        circleOutDiv.remove();
                    }

                }, (transitionSeconds * 1000) / transitionIterations);
            }
        </script>
    ';

?>
