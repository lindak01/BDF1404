<?php foreach ($stylist as $stylist_detail): ?>

    <h2><?php echo $stylist_detail['fname'] ?> <?php echo $stylist_detail['lname'] ?></h2>
    <p><a href="stylists/<?php echo $stylist_detail['userId'] ?>"View Details</a></p>
    
<?php endforeach ?>