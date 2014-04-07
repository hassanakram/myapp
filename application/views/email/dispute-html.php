<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Dispute Transaction Request on <?php echo $site_name; ?></title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">A dispute request has been submitted !</h2>
A dispute has been submitted by <?php echo '<b>'.$username.'</b>'; ?> against  <?php echo '<b>'.$tutorname.'</b>'; ?>  .<br />
The description of the dispute is as follows :
<br />
<br />
<b><?php echo $desc ?><br /></b>
<br />


The detail of the student is as follow :
<br /><br />
name : <?php echo $username ?><br />
contact # : <?php echo $student_contact ?><br />
email id : <?php echo $student_email ?><br />
<br />
<br />
<br />
The detail of the Tutor is as follow :<br />
<br />
name : <?php echo $tutorname ?><br />
contact # : <?php echo $tutor_contact ?><br />
email id : <?php echo $tutor_email ?><br />



<br />
Thank you,<br />
The <?php echo $site_name; ?> Team
</td>
</tr>
</table>
</div>
</body>
</html>