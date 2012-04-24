
<ul class="thumbnails">

    <?php 
     $photos_arr =  $photos->getRawValue();
     foreach ($photos_arr as &$value) {
	echo '<li class="span3">';
	    echo '<a href="#" class="thumbnail">';
                echo '<img src="' . $value['path'] .  '" alt="">';
                echo '<h5>' . $value['name'] . '</h5>';
             echo '</a>';
        echo '</li>';
     }  
?>
</ul>

