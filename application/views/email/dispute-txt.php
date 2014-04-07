Hi<?php if (strlen($username) > 0) { ?> <?php echo $username; ?><?php } ?>,


A dispute has been submitted by <b>$username<b/> against <b> $tutorname </b> . The description of the dispute is as follows :

<?php echo $desc ?>

The detail of the student is as follow :

name : <?php echo $username ?>
contact # : <?php echo $student_contact ?>
email id : <?php echo $student_email ?>

The detail of the Tutor is as follow :

name : <?php echo $tutorname ?>
contact # : <?php echo $tutor_contact ?>
email id : <?php echo $tutor_email ?>


Thank you,
The <?php echo $site_name; ?> Team