<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/cards" class="btn btn-light">Back</a>
<br>
<h1><?php echo $data['card']->name ?></h1>
<?php 
    if($data['card']->tribeName != ''){?>
      <p>Tribe: <?php echo $data['card']->tribeName; ?></p>
    <?php } ?>

<hr>
<a href="<?php echo URLROOT; ?>/cards/edit/<?php echo $data['card']->CardID; ?>" class="btn btn-dark">Edit</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/cards/delete/<?php echo $data['card']->CardID; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>