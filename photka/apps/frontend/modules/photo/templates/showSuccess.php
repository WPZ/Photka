<style type="text/css">
ul.rating,
ul.rating li,
ul.rating a {
    overflow: hidden;
    height: 18px;
    margin: 0;
    padding: 0;
    border: 0;
    line-height: 16px;
}
ul.rating li.current-rating,
ul.rating a {
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    text-indent: -100%;

}
ul.rating,
ul.rating a:hover,
ul.rating li.current-rating {
    background: url('/img/stars.png') repeat-x 0 -999% transparent;
}
ul.rating a:active,
ul.rating a:focus,
ul.rating a:hover {
    background-position: 0 100%;
}
ul.rating li.current-rating {
    background-position: 0 50%;
}
ul.rating {
    display: inline-block;
    position: relative;
    z-index: 1;
    width: 90px;
    background-position: 0 0;
    text-align: left;
    list-style: none;
    *zoom: 1;
}
ul.rating li {
    display: inline;
}
ul.rating li.rate-1 a {
    width: 20%;
    z-index: 6;
}
ul.rating li.rate-2 a {
    width: 40%;
    z-index: 5;
}
ul.rating li.rate-3 a {
    width: 60%;
    z-index: 4;
}
ul.rating li.rate-4 a {
    width: 80%;
    z-index: 3;
}
ul.rating li.rate-5 a {
    width: 100%;
    z-index: 2;
}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    jQuery.noConflict();

    jQuery(function() {
        var ratings = jQuery('ul.rating').find('a');
        ratings.click(function(e) {
            var ul = jQuery(this).parents('ul.rating:first');
            var id = ul.attr('id');
            var value = jQuery(this).text();
            var target = jQuery('input[name="' + id + '"]');
            var current_rating = ul.find('.current-rating');
            var modulo = 100 / parseFloat(ul.find('li[class*="rate-"]').length);
            var width = parseInt(value) * modulo;

            target.(int)val(value);
            current_rating.css('width', width + '%');

           // e.preventDefault();
            
        });
    });
</script>
<h1>Zdjęcie <?php echo $photo->getName(); ?></h1>

<div class="row-fluid" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
    <div class="span9">
        <img src="<?php echo $photo->getPath(); ?>">
    </div>
    <div class="span3">
            <h3>Informacje</h3>
            <table class="table table-striped">
                <tr>
                    <td>Nazwa: </td>
                    <td><?php echo $photo->getName(); ?></td>
                </tr>
                <tr>
                    <td>Autor: </td>
                    <td><?php echo $photo->getSfGuardUser()->getName(); ?></td>
                </tr>
                <tr>
                    <td>Data dodania: </td>
                    <td><?php echo $photo->getCreatedAt(); ?></td>
                </tr>
                <tr>
                    <td>Opis: </td>
                    <td><?php echo $photo->getDescription(); ?></td>
                </tr>
                <tr>
                    <td>Miejsce: </td>
                    <td><?php echo $photo->getLocation(); ?></td>
                </tr>
                <tr>
                    <td>Twoja ocena: </td>
                    <td>
                        <ul id="call_center" style="margin-bottom: -3px;" class="rating">
                            <li style="width: <?php echo round($photo->getRateByUserId($user->getId()), 1) * 20; ?>%;" class="current-rating"></li>
                            <?php for ($i = 1; $i < 6; $i++): ?>
                                <li class="rate-<?php echo $i; ?>"><a title="<?php echo $i; ?>" id="rate-<?php echo $i; ?>" href="<?php echo url_for('photo_rate', array('id' => $photo->getId(), 'user_id' => $user->getId(), 'rate' => $i)); ?>" ><?php echo $i; ?></a></li>
                            <?php endfor; ?>
                        </ul>
                        <input name="call_center" type="hidden"/>
                    </td>
                </tr>
                <tr>
                    <td>Ocena: </td>
                    <td>
                        <ul id="call_center" style="margin-bottom: -3px;" class="rating">
                            <li style="width: <?php echo round($photo->getAvgRates(), 1) * 20; ?>%;" class="current-rating" ></li>
                        </ul>
                    </td>
                </tr>
            </table>
    </div>    
</div>