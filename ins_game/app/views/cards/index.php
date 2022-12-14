<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Cards</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/cards/add" class="btn btn-primary">
       Add a Card
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['cards'] as $card) : ?>
    <a href="<?php echo URLROOT; ?>/cards/show/<?php echo $card->CardID; ?>" class="list-group-item list-group-item-action"><?php echo $card->CardName?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>