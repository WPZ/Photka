

<h1>Zdjęcia</h1>

<div class="row" style="margin-top: 30px;">
    <div class="span6">
        <h3>Moje:</h3>
        <?php if ($my_photos->count()): ?>
            <ul class="thumbnails">
            <?php foreach ($my_photos as $photo): ?>
                <li class="span3">
                    <a href="#" class="thumbnail">
                        <img src="<?php echo $photo->getPath(); ?>" alt="">
                        <h5><?php echo $photo->getName(); ?></h5>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <p style="font-style: italic;"> Nie dodałeś jeszcze żadnego zdjęcia </p>
        <?php endif; ?>
        <a class="btn btn-success" href="<?php echo url_for('photo/new') ?>">Dodaj &raquo;</a>
    </div>
    <div class="span6">
        <h3>Ostatnio dodane</h3>
        <ul class="thumbnails">
            <?php foreach ($other_photos as $photo): ?>
                <li class="span3">
                    <a href="#" class="thumbnail">
                        <img src="<?php echo $photo->getPath(); ?>" alt="">
                        <h5><?php echo $photo->getName(); ?></h5>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>    
</div>