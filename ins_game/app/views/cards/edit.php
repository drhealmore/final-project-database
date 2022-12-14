<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/cards" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit Card</h2>
    <form action="<?php echo URLROOT; ?>/cards/edit/<?php echo $data['CardID']; ?>" method="post">
    <div class="form-group">
        <label for="name">Card ID: <sup>*</sup></label>
        <input type="text" name="CardID" class="form-control form-control-lg <?php echo (!empty($data['CardID_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['CardID']; ?>">
        <span class="invalid-feedback"><?php echo $data['CardID']; ?></span>
      </div>
      <div class="form-group">
        <label for="CardName">Card Name: <sup>*</sup></label>
        <input type="text" name="CardName" class="form-control form-control-lg <?php echo (!empty($data['CardName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['CardName']; ?>">
        <span class="invalid-feedback"><?php echo $data['CardName']; ?></span>
      </div>
      <div class="form-group">
        <label for="CardHealth">Card Health: <sup>*</sup></label>
        <input name="CardHealth" class="form-control form-control-lg <?php echo (!empty($data['CardHealth_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['CardHealth']; ?>">
        <span class="invalid-feedback"><?php echo $data['CardHealth_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="CardAttack">Card Attack: <sup>*</sup></label>
        <input name="CardAttack" class="form-control form-control-lg <?php echo (!empty($data['CardAttack_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['CardAttack']; ?>">
        <span class="invalid-feedback"><?php echo $data['CardAttack_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="BloodCost">Blood Cost: <sup>*</sup></label>
        <input type="text" name="BloodCost" class="form-control form-control-lg <?php echo (!empty($data['BloodCost_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['BloodCost']; ?>">
        <span class="invalid-feedback"><?php echo $data['BloodCost_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="BoneCost">Bone Cost: <sup>*</sup></label>
        <input type="text" name="BoneCost" class="form-control form-control-lg <?php echo (!empty($data['BoneCost_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['BoneCost']; ?>">
        <span class="invalid-feedback"><?php echo $data['BoneCost_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="TribeID">Tribe ID: <sup>*</sup></label>
        <input type="text" name="TribeID" class="form-control form-control-lg <?php echo (!empty($data['Tribe_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['TribeID']; ?>">
        <span class="invalid-feedback"><?php echo $data['Tribe_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="FirstSigilID">First Sigil ID: <sup>*</sup></label>
        <input type="text" name="FirstSigilID" class="form-control form-control-lg <?php echo (!empty($data['FirstSigilID_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['FirstSigilID']; ?>">
        <span class="invalid-feedback"><?php echo $data['FirstSigilID_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="SecondSigilID">Second Sigil ID: <sup>*</sup></label>
        <input type="text" name="SecondSigilID" class="form-control form-control-lg <?php echo (!empty($data['SecondSigilID_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['SecondSigilID']; ?>">
        <span class="invalid-feedback"><?php echo $data['SecondSigilID_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>