function archi_customized_map() { 
?>
<style>
.pins-group .cstm-map-list {
    display: none;
}
.pins-group.active2 .accordion {
       background-color: #ccc;
}
.pins-group.active2 .cstm-map-list {
    display: revert;
}
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: block;
  background-color: white;
  overflow: hidden;
}
button.accordion {
    padding: 0px 20px;
    background-color: transparent;
}
.cstm-map-group-container {
    display: flex;
    flex-direction: row-reverse;
}
	.gmap_canvas {
    width: 100% !important;
	}
	.mapouter {
    width: 100% !important;
	}
	.cstm-map-left-column {
    width: 75%;
	}
	.cstm-map-right-column {
    width: 40%;
    text-align: center;
	}
	.logo-pins {
    display: flex;
    align-items: end;
	}
.cstm-map-group {
    padding: 0px 20px;
    text-align: left;
    padding-top: 30px;
    height: 79.5vh;
    overflow: scroll;
    overflow-x: hidden;
}
.gm-style-iw-d h5 {
    font-family: 'proxima-nova';
    font-weight: 500;
}
.gm-style-iw-d a:focus-visible {
    border: none;
    outline: 0;
}
.cstm-map-group .pins-group {
    border-bottom: 1px solid #D1EBDC;
    padding-top: 20px;
    padding-bottom: 20px;
}
ul.cstm-map-list {
    list-style-type: none;
    padding-left: 0;
        overflow-y: scroll;
    height: 140px;
}
	.logo-pins img {
    padding: 7px 0px;
    display: flex;
	}
.logo-pins h4 {
    padding-left: 15px;
    font-size: 30px;
    color: #1C4237;
    font-weight: 500;
    font-family: 'Futura PT';
	cursor:pointer;
}
.view {
    padding: 41px;
    padding: 20px 62px;
}
.hide {
    display: none;
}
div#map {
    height: 100%;
}
	ul.cstm-map-list li {
    cursor: pointer;
}
.pins-group.group-3 {
    border: none !important;
}
p.see-all {
    padding: 19px 53px;
    text-align: center;
    border: 1px solid #357C66;
    width: 194px;
    font-size: 17px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #1C4237;
    font-weight: 500;
    cursor: pointer;
}
	.meet-your-neighbours h2 {
    font-size: 39px;
    font-family: 'proxima-nova';
    font-weight: 700;
}

.meet-your-neighbours {
    background-color: #357C68;
    padding: 60px 40px 53px;
    color: white;
    font-family: 'Futura PT';
}
.cstm-map-list p {
    margin-bottom: 0px;
    font-size: 18px;
    line-height: 35px;
}
@media screen and (min-width: 768px) and (max-width:1024px){
	.cstm-map-group {
    padding: 30px;
    text-align: left;
    padding-top: 30px;
}
.meet-your-neighbours h2 {
    font-size: 37px;
}
.meet-your-neighbours {
    background-color: #357C66;
    padding: 30px;
    color: white;
    font-family: 'Futura PT';
}
.logo-pins h4 {
    padding-left: 15px;
    font-size: 25px;
    color: #1C4237;
    font-weight: 500;
    font-family: 'Futura PT';
}
}
@media screen and (max-width: 767px){
	ul.cstm-map-list {
    list-style-type: none;
    padding-left: 48px;
}
	.logo-pins img {
    padding: 7px 0px;
    display: flex;
    height: 50px;
	}
    .cstm-map-group-container {
        flex-direction: column-reverse;
    } 
    .meet-your-neighbours h2 {
    font-size: 33px;
}
.logo-pins h4 {
    padding-left: 15px;
    font-size: 25px;
    color: #1C4237;
    font-weight: 500;
    font-family: 'Futura PT';
}
.meet-your-neighbours {
    background-color: #357C66;
    padding: 22px;
    color: white;
    font-family: 'Futura PT';
}
.cstm-map-group {
    padding: 20px;
    text-align: left;
    padding-top: 30px;
}
    .cstm-map-right-column {
        width: 100% !important;
    }
    .cstm-map-left-column {
        width: 100% !important;
    }
    div#map {
        height: 100vh;
    }
    p.see-all {
    padding: 19px 53px;
    text-align: center;
    border: 1px solid #357C66;
    width: auto;
}
.view {
    padding: 41px;
    padding: 0px 40px;
}
</style>
	
	<div class="cstm-map-group-container">
		<!--Start of 1st column -->
		<div class="cstm-map-left-column">
			<div id="map">
			</div>
		</div>
		<!--End Of 1st Column-->

		<!--Start of 2nd column -->
		<div class="cstm-map-right-column">
			<div class="meet-your-neighbours"><h2>Close to Everything</h2></div>
	        <div class="cstm-map-group">
	            
	            <?php

				// Check rows exists.
				if( have_rows('meet') ):
					$group_number = 0;
				    // Loop through rows.
				    while( have_rows('meet') ) : the_row();

					        // (Second Loop) Load sub field value.
					        $sub_value = get_sub_field('location_title');
					        // Do something...
					        $direction_title = get_sub_field('pin-icon');

					        echo '<div class="pins-group group-'.$group_number.'"><button class="accordion"><div class="logo-pins"><img src="'.$direction_title.'"/><h4>'.$sub_value.'</h4></div></button><ul class="cstm-map-list">';
							
					        if( have_rows('location') ):
							    while ( have_rows('location') ) : the_row();
							    	$direction_title = get_sub_field('pin-icon');
							        $direction_title = get_sub_field('direction_title');
							        $direction_link = get_sub_field('direction_link');
									$longitude = get_sub_field('longitude');
									$latitude = get_sub_field('latitude');
							        // Do something...
							        echo '<div class="panel"><li maps-direction="'.$direction_link.'" maps-lat="'.$latitude.'" maps-long="'.$longitude.'" maps-group="group-'.$group_number.'"><p>'.$direction_title.'</p></li></div>';
							    endwhile;
							endif;
							echo '</ul></div>';
							$group_number++;
							//End Of 2nd Loop
							//
				    // End loop.
				    endwhile;
					
				// No value.
				else :
				    // Do something...
				endif;
				?>
				<div class="view">
	        <p class="see-all">View All</p>
	    	</div>
	    </div>
	        </div>
	        
	    <!--End Of 2nd Column-->
    </div>
<?php
} 
// register shortcode
add_shortcode('customized_map', 'archi_customized_map'); 
