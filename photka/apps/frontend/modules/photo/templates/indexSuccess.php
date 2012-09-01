

<h1>Zdjęcia</h1>

<div class="row-fluid" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
    <div class="span9">
<!--        <div class="well">-->
            <h3>Moje:</h3>
            <?php if ($my_photos->count()): ?>
                <ul class="thumbnails">
                    <?php foreach ($my_photos as $photo): ?>
                        <li class="span3">
                            <a href="<?php echo url_for('photo_show', array('id' => $photo->getId())); ?>" class="thumbnail">
                                <img src="<?php echo $photo->getPath(); ?>" alt="">
                                <h5><?php echo $photo->getName(); ?></h5>
                            </a>
                            <a href="<?php echo url_for('photo/edit'); ?>" class="btn btn-info">edytuj</a>
                            <a href="<?php echo url_for('photo/delete'); ?>" class="btn btn-danger">usuń</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="font-style: italic;"> Nie dodałeś jeszcze żadnego zdjęcia </p>
            <?php endif; ?>
            <a class="btn btn-success" href="<?php echo url_for('photo/new') ?>">Dodaj &raquo;</a>
<!--        </div>-->
    </div>
    <div class="span3">
<!--        <div class="well">-->
            <h3>Ostatnio dodane</h3>
            <ul class="thumbnails">
                <?php foreach ($other_photos as $photo): ?>
                    <li class="span3">
                        <a href="<?php echo url_for('photo_show', array('id' => $photo->getId())); ?>" class="thumbnail">
                            <img src="<?php echo $photo->getPath(); ?>" alt="">
                            <h5><?php echo $photo->getName(); ?></h5>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
<!--        </div>-->
    </div>    
</div>