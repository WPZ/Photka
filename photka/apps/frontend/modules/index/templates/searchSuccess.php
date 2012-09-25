
<ul class="thumbnails">

    <?php 
     $photos_arr =  $photos->getRawValue();
     foreach ($photos_arr as &$value) {
         
         $kat = '';
         foreach ($value['PhotoCategoryValues'] as $PhotoCategoryValues) {
            
             $cv_arr = $PhotoCategoryValues['CategoryValue'];
             $kat .= $cv_arr[value] . ' ';
             $c_arr = $cv_arr['Category'];

             $kat .= '(' . $c_arr[name] . '), ';
             
         }
	echo '<li class="span3">';
	    echo '<a href="#" class="thumbnail">';
                echo '<img src="' . $value['path'] .  '" alt="">';
                echo '<h5> Nazwa pliku: ' . $value['name'] . '</h5>';
                echo '<p> Opis: ' . $value['description'] . '</p>';
                echo '<p> Kategorie: ' . $kat . '</p>';
             echo '</a>';
        echo '</li>';
     }  
?>
</ul>

