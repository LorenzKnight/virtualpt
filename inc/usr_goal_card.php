<div class="col-xl-4 col-md-6 mb-4">
    <div class="space">
    Goal
    <br>
    <?php if ($row_DatosGoal > 0) { ?>

    <br>Weight: <?php echo $row_DatosGoal['usr_weight_goal']; ?> kg
    <br>
    <br>Biceps: <?php echo $row_DatosGoal['usr_biceps_goal']; ?> cm
    <br>Chest: <?php echo $row_DatosGoal['usr_chest_goal']; ?> cm
    <br>Waist: <?php echo $row_DatosGoal['usr_waist_goal']; ?> cm
    <br>Hips: <?php echo $row_DatosGoal['usr_hips_goal']; ?> cm
    <br>Thigh: <?php echo $row_DatosGoal['usr_thigh_goal']; ?> cm
    <br>Fat: <?php echo $row_DatosGoal['usr_fat_goal']; ?> %
    
    <?php
    }
    else
    { ?>
    <br>You have not set any goal.
    <?php }  ?>
    </div>
</div>