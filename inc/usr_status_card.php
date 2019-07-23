<div class="col-xl-4 col-md-6 mb-4">
    <div class="space">
    Actual Status
    <br>
    <?php if ($row_DatosCurrent > 0) { ?>

    <br><?php echo $row_DatosConsulta['name']; ?>
    <br><?php echo $yearold; ?> Year old
    <br>Weight: <?php echo $row_DatosCurrent['usr_weight']; ?> kg
    <br>Height: <?php echo $row_DatosCurrent['usr_height']; ?> cm
    <br>
    <br> Biceps: <?php echo $row_DatosCurrent['usr_biceps']; ?> cm
    <br>Chest: <?php echo $row_DatosCurrent['usr_chest']; ?> cm
    <br>Waist: <?php echo $row_DatosCurrent['usr_waist']; ?> cm
    <br>Hips: <?php echo $row_DatosCurrent['usr_hips']; ?> cm
    <br>Thigh: <?php echo $row_DatosCurrent['usr_thigh']; ?> cm
    <br>Fat: <?php echo $row_DatosCurrent['usr_fat']; ?> %
    
    <?php }  ?>
    </div>
</div>