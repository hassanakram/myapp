
<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My App - Login Page</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo site_url('../bootstrap/css/bootstrap.min.css'); ?>" />
        <!-- theme color-->
            <link rel="stylesheet" href="<?php echo site_url('../css/blue.css'); ?>" />
        

        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo site_url('../css/style.css'); ?>" />
    
        <!-- favicon -->
            <link rel="shortcut icon" href="<?php echo site_url('../favicon.ico'); ?>" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>


        
        

        <link rel="stylesheet" href="<?php echo site_url('../lib/bootstrap-switch/static/stylesheets/bootstrap-switch.css'); ?>" />
        <link rel="stylesheet" href="<?php echo site_url('../lib/bootstrap-switch/static/stylesheets/bootstrap-switch.css'); ?>" />

        <!--[if lt IE 9]>
            <script src="../js/ie/html5.js'); ?>"></script>
            <script src="../js/ie/respond.min.js'); ?>"></script>
        <![endif]-->
        
    </head>
    <body>

<div class="col-sm-12 col-md-12" style="margin-top: 60;">
        <h3 class="heading">Availabilities of Timing slots</h3>
        <div id="dt_a_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div class="dt_actions"></div><div id="dt_a_length" class="dataTables_length"></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dt_a_filter"></div></div></div><table class="table table-striped table-bordered dTableR dataTable" id="dt_a" aria-describedby="dt_a_info">

    
        <thead>
            <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">Timing</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">Monday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Tuesday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Wednesday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Thursday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Friday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Saturday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">Sunday</th></tr>
        </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
<?php   echo form_open("auth/setCalendar"); ?>
    <tr class="odd">
        <?php 

            $mon = strpos($monday,"07:00 A.M");
            $tue = strpos($tuesday,"07:00 A.M");
            $wed = strpos($wednesday,"07:00 A.M");
            $thu = strpos($thursday,"07:00 A.M");
            $fri = strpos($friday,"07:00 A.M");
            $sat = strpos($saturday,"07:00 A.M");
            $sun = strpos($sunday,"07:00 A.M");
        ?>

        <td class=" sorting_1">07:00 A.M</td>

        <?php 

            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="monday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
    

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>
         <td> <input type="checkbox" name="sunday 07:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        
                
    </tr><td class=" sorting_1">08:00 A.M</td>
        <?php 

            $mon = strpos($monday,"08:00 A.M");
            $tue = strpos($tuesday,"08:00 A.M");
            $wed = strpos($wednesday,"08:00 A.M");
            $thu = strpos($thursday,"08:00 A.M");
            $fri = strpos($friday,"08:00 A.M");
            $sat = strpos($saturday,"08:00 A.M");
            $sun = strpos($sunday,"08:00 A.M");
        ?>

        

       

        <?php 

            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="monday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
    

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>
         <td> <input type="checkbox" name="sunday 08:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>



        </tr><td class=" sorting_1">09:00 A.M</td>
        <?php 

            $mon = strpos($monday,"09:00 A.M");
            $tue = strpos($tuesday,"09:00 A.M");
            $wed = strpos($wednesday,"09:00 A.M");
            $thu = strpos($thursday,"09:00 A.M");
            $fri = strpos($friday,"09:00 A.M");
            $sat = strpos($saturday,"09:00 A.M");
            $sun = strpos($sunday,"09:00 A.M");
        ?>

        
        <?php 

            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="monday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
    

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>
         <td> <input type="checkbox" name="sunday 09:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        

        


        </tr><td class=" sorting_1">10:00 A.M</td>
        <?php 

            $mon = strpos($monday,"10:00 A.M");
            $tue = strpos($tuesday,"10:00 A.M");
            $wed = strpos($wednesday,"10:00 A.M");
            $thu = strpos($thursday,"10:00 A.M");
            $fri = strpos($friday,"10:00 A.M");
            $sat = strpos($saturday,"10:00 A.M");
            $sun = strpos($sunday,"10:00 A.M");
        ?>

        

        

                <?php 

            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="monday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
    

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>
         <td> <input type="checkbox" name="sunday 10:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        </tr><td class=" sorting_1">11:00 A.M</td>
        <?php 

            $mon = strpos($monday,"11:00 A.M");
            $tue = strpos($tuesday,"11:00 A.M");
            $wed = strpos($wednesday,"11:00 A.M");
            $thu = strpos($thursday,"11:00 A.M");
            $fri = strpos($friday,"11:00 A.M");
            $sat = strpos($saturday,"11:00 A.M");
            $sun = strpos($sunday,"11:00 A.M");
        ?>

        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 11:00 A.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        </tr><td class=" sorting_1">12:00 P.M</td>
        <?php 
            $mon = strpos($monday,"12:00 P.M");
            $tue = strpos($tuesday,"12:00 P.M");
            $wed = strpos($wednesday,"12:00 P.M");
            $thu = strpos($thursday,"12:00 P.M");
            $fri = strpos($friday,"12:00 P.M");
            $sat = strpos($saturday,"12:00 P.M");
            $sun = strpos($sunday,"12:00 P.M");
        ?>

        

       

        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 12:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        </tr><td class=" sorting_1">01:00 P.M</td>
        <?php 

            $mon = strpos($monday,"01:00 P.M");
            $tue = strpos($tuesday,"01:00 P.M");
            $wed = strpos($wednesday,"01:00 P.M");
            $thu = strpos($thursday,"01:00 P.M");
            $fri = strpos($friday,"01:00 P.M");
            $sat = strpos($saturday,"01:00 P.M");
            $sun = strpos($sunday,"01:00 P.M");
        ?>

        


        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 01:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        </tr><td class=" sorting_1">02:00 P.M</td>
        <?php 

            $mon = strpos($monday,"02:00 P.M");
            $tue = strpos($tuesday,"02:00 P.M");
            $wed = strpos($wednesday,"02:00 P.M");
            $thu = strpos($thursday,"02:00 P.M");
            $fri = strpos($friday,"02:00 P.M");
            $sat = strpos($saturday,"02:00 P.M");
            $sun = strpos($sunday,"02:00 P.M");
        ?>

        



        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 02:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        </tr><td class=" sorting_1">03:00 P.M</td>
        <?php 

            $mon = strpos($monday,"03:00 P.M");
            $tue = strpos($tuesday,"03:00 P.M");
            $wed = strpos($wednesday,"03:00 P.M");
            $thu = strpos($thursday,"03:00 P.M");
            $fri = strpos($friday,"03:00 P.M");
            $sat = strpos($saturday,"03:00 P.M");
            $sun = strpos($sunday,"03:00 P.M");
        ?>

        
        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 03:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        </tr><td class=" sorting_1">04:00 P.M</td>
        <?php 

            $mon = strpos($monday,"04:00 P.M");
            $tue = strpos($tuesday,"04:00 P.M");
            $wed = strpos($wednesday,"04:00 P.M");
            $thu = strpos($thursday,"04:00 P.M");
            $fri = strpos($friday,"04:00 P.M");
            $sat = strpos($saturday,"04:00 P.M");
            $sun = strpos($sunday,"04:00 P.M");
        ?>

        

        

        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 04:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>



        </tr><td class=" sorting_1">05:00 P.M</td>
        <?php 

            $mon = strpos($monday,"05:00 P.M");
            $tue = strpos($tuesday,"05:00 P.M");
            $wed = strpos($wednesday,"05:00 P.M");
            $thu = strpos($thursday,"05:00 P.M");
            $fri = strpos($friday,"05:00 P.M");
            $sat = strpos($saturday,"05:00 P.M");
            $sun = strpos($sunday,"05:00 P.M");
        ?>

        

       

         <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 05:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        </tr><td class=" sorting_1">06:00 P.M</td>
        <?php 

            $mon = strpos($monday,"06:00 P.M");
            $tue = strpos($tuesday,"06:00 P.M");
            $wed = strpos($wednesday,"06:00 P.M");
            $thu = strpos($thursday,"06:00 P.M");
            $fri = strpos($friday,"06:00 P.M");
            $sat = strpos($saturday,"06:00 P.M");
            $sun = strpos($sunday,"06:00 P.M");
        ?>

        

        

        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 06:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        </tr><td class=" sorting_1">07:00 P.M</td>
        <?php 

            $mon = strpos($monday,"07:00 P.M");
            $tue = strpos($tuesday,"07:00 P.M");
            $wed = strpos($wednesday,"07:00 P.M");
            $thu = strpos($thursday,"07:00 P.M");
            $fri = strpos($friday,"07:00 P.M");
            $sat = strpos($saturday,"07:00 P.M");
            $sun = strpos($sunday,"07:00 P.M");
        ?>

        
        <?php 
            if (!($mon === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        ?>

        <td> <input type="checkbox" name="monday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($tue === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="tuesday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($wed === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
        ?>

        <td> <input type="checkbox" name="wednesday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($thu === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="thursday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>


        <?php 

            if (!($fri === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

                                        
         <td> <input type="checkbox" name="friday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>
                    
             


        <?php 

            if (!($sat === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
        
          ?>

         <td> <input type="checkbox" name="saturday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

        <?php 

            if (!($sun === false))
            {
                $setting='checked';
            } 
            else
            {
                $setting='unchecked';
            }
          ?>

         <td> <input type="checkbox" name="sunday 07:00 P.M" class="onoffswitch-checkbox"    <?php echo $setting ?>  > </td>

    </tr></tbody></table>
    
    <input style="float:right;" type="submit" name="get_setting" value="Save Setting" class="btn btn-gebo" />

    <?php echo form_close(); ?>


</div>

        <script src="<?php echo site_url('../js/jquery.min.js'); ?>"></script>
        <script src="<?php echo site_url('../js/jquery.actual.min.js'); ?>"></script>
        <script src="<?php echo site_url('../lib/validation/jquery.validate.js'); ?>"></script>
        <script src="<?php echo site_url('../bootstrap/js/bootstrap.min.js'); ?>"></script>

        <script src="<?php echo site_url('../lib/bootstrap-switch/static/js/bootstrap-switch.min.js'); ?>"></script>

        <!-- tooltip -->    
            <link rel="stylesheet" href="<?php echo site_url('../lib/qtip2/jquery.qtip.min.css'); ?>" />
        
    


        

        <script>
            $(document).ready(function(){
                
                //* boxes animation
                form_wrapper = $('.login_box');
                function boxHeight() {
                    form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);   
                };
                form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
                    var target  = $(this).attr('href'),
                        target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height'        : form_wrapper.height()
                    }); 
                    $(form_wrapper.find('form:visible')).fadeOut(400,function(){
                        form_wrapper.stop().animate({
                            height   : target_height,
                            marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
                            $(form_wrapper).css({
                                'height'        : ''
                            }); 
                        });
                    });
                    e.preventDefault();
                });
                
                //* validation
                $('#login_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    rules: {
                        login: { required: true, minlength: 4 },
                        password: { required: true, minlength: 4 }
                    },
                    highlight: function(element) {
                        $(element).closest('div').addClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    }
                });
            });
        </script>

    </body>
</html>
