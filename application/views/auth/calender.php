
<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Upcoming Schedule  </title>

        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo site_url('../bootstrap/css/bootstrap.min.css'); ?>" />
        <!-- jQuery UI theme -->
            <link rel="stylesheet" href="<?php echo site_url('../lib/jquery-ui/css/Aristo/Aristo.css'); ?>" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo site_url('../lib/jBreadcrumbs/css/BreadCrumb.css'); ?>" />
        <!-- tooltips-->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/qtip2/jquery.qtip.min.css'); ?>" />
        <!-- colorbox -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/colorbox/colorbox.css'); ?>" />
        <!-- code prettify -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/google-code-prettify/prettify.css'); ?>" />    
        <!-- sticky notifications -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/sticky/sticky.css'); ?>" />    
        <!-- aditional icons -->
            
            <link rel="stylesheet" href="<?php echo site_url('../img/splashy/splashy.css'); ?>" />
        <!-- flags -->
            
            <link rel="stylesheet" href="<?php echo site_url('../img/flags/flags.css'); ?>" />    
        <!-- datatables -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/datatables/extras/TableTools/media/css/TableTools.css'); ?>" />

        <!-- datepicker -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/datepicker/datepicker.css'); ?>" />
        <!-- datepicker -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/timepicker/css/bootstrap-timepicker.css'); ?>" />
        <!-- tag handler -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/tag_handler/css/jquery.taghandler.css'); ?>" />
        <!-- uniform -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/uniform/Aristo/uniform.aristo.css'); ?>" />
        <!-- multiselect -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/multi-select/css/multi-select.css'); ?>" />
        <!-- enhanced select -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/chosen/chosen.css'); ?>" />
        <!-- upload -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css'); ?>" />
        <!-- colorpicker -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/colorpicker/css/colorpicker.css'); ?>" />
        <!-- switch buttons -->
            
            <link rel="stylesheet" href="<?php echo site_url('../lib/bootstrap-switch/static/stylesheets/bootstrap-switch.css'); ?>" />

        <!-- main styles -->
            
            <link rel="stylesheet" href="<?php echo site_url('../css/style.css'); ?>" />
        <!-- theme color-->
            
            <link rel="stylesheet" href="<?php echo site_url('../css/blue.css'); ?>" />   
            
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
            <script src="../js/ie/html5.js'); ?>"></script>
            <script src="../js/ie/respond.min.js'); ?>"></script>
        <![endif]-->

    
       
        
    </head>
    <body>

<body class="full_width">
        <div id="maincontainer" class="clearfix">
            <div id="contentwrapper">
                <div class="main_content">
                    <div class="row search_page">
                        <div class="col-sm-12 col-md-12">
                            <div id="dt_a_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div class="dt_actions"></div><div id="dt_a_length" class="dataTables_length"></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dt_a_filter"></div></div></div><table class="table table-striped table-bordered dTableR dataTable" id="dt_a" aria-describedby="dt_a_info">

                        
                            <thead>
                                <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Browser: activate to sort column ascending">Timing</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Engine version: activate to sort column ascending">Monday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Engine version: activate to sort column ascending">Tuesday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Engine version: activate to sort column ascending">Wednesday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Engine version: activate to sort column ascending">Thursday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Engine version: activate to sort column ascending">Friday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Engine version: activate to sort column ascending">Saturday</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 12.5%;" aria-label="Browser: activate to sort column ascending">Sunday</th></tr>
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

                            
                            <td>
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="monday 07:00 A.M"  name="monday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for="monday 07:00 A.M"></label>
                                    </div>
                                </section>
                            </td>

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
                            <td>
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="tuesday 07:00 A.M" name="tuesday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for="tuesday 07:00 A.M"></label>
                                    </div>
                                </section>
                            </td>
                        

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="wednesday 07:00 A.M" name="wednesday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for="wednesday 07:00 A.M"></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="thursday 07:00 A.M" name="thursday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="friday 07:00 A.M" name="friday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="saturday 07:00 A.M" name="saturday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 07:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

                            
                                    
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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                        

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 08:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>



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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                        

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 09:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

                            

                            


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                        

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 10:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 11:00 A.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 12:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 01:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 02:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 03:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 04:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>



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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 05:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 06:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="monday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="tuesday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                            <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="wednesday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="thursday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>


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

                                                            
                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="friday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>
                                        
                                 


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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="saturday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

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

                             <td> 
                                <section>
                                    <div class="checkboxThree">
                                        <input type="checkbox" id="" name="sunday 07:00 P.M" class="checkboxThreeInput"    <?php echo $setting ?>  >
                                        <label for=""></label>
                                    </div>
                                </section>
                             </td>

                        </tr></tbody></table>
                        
                        <input style="float:right;" type="submit" name="get_setting" value="Save availabilities" class="btn btn-gebo" />

                        <?php echo form_close(); ?>
                        </div>
                        </div>
                    </div>           
                </div>
            </div>


        <?php
            $rootDir = "";
            if(strpos($_SERVER['HTTP_HOST'],'localhost')===FALSE)
            {
              //On Production
              $rootDir = $_SERVER['DOCUMENT_ROOT'].'/application/views';
            }
            else
            {
              //On Dev server
              $rootDir = $_SERVER['DOCUMENT_ROOT'].'/myapp/application/views';
            }
        ?>
        <?php include($rootDir.'/sidebar.php');?>

    
                <script src="<?php echo site_url('../js/jquery.min.js'); ?>"></script>

    
    <script src="<?php echo site_url('../js/jquery-migrate.min.js'); ?>"></script>

    
    <script src="<?php echo site_url('../lib/jquery-ui/jquery-ui-1.10.0.custom.min.js'); ?>"></script>

    <!-- touch events for jquery ui-->
    
    <script src="<?php echo site_url('../js/forms/jquery.ui.touch-punch.min.js'); ?>"></script>
    <!-- easing plugin -->
    
    <script src="<?php echo site_url('../js/jquery.easing.1.3.min.js'); ?>"></script>
    <!-- smart resize event -->
    
    <script src="<?php echo site_url('../js/jquery.debouncedresize.min.js'); ?>"></script>
    <!-- js cookie plugin -->
    
    <script src="<?php echo site_url('../js/jquery_cookie_min.js'); ?>"></script>
    <!-- main bootstrap js -->
    
    <script src="<?php echo site_url('../bootstrap/js/bootstrap.min.js'); ?>"></script>
    
    <!-- bootstrap plugins -->
    <script src="<?php echo site_url('../js/bootstrap.plugins.min.js'); ?>"></script>
    
    <!-- code prettifier -->
    
    <script src="<?php echo site_url('../lib/google-code-prettify/prettify.min.js'); ?>"></script>
    <!-- sticky messages -->
    
    <script src="<?php echo site_url('../lib/sticky/sticky.min.js'); ?>"></script>
    <!-- tooltips -->
    
    <script src="<?php echo site_url('../lib/qtip2/jquery.qtip.min.js'); ?>"></script>
    <!-- lightbox -->
    
    <script src="<?php echo site_url('../lib/colorbox/jquery.colorbox.min.js'); ?>"></script>
    <!-- jBreadcrumbs -->
    
    <script src="<?php echo site_url('../lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js'); ?>"></script>
    <!-- hidden elements width/height -->
    
    <script src="<?php echo site_url('../js/jquery.actual.min.js'); ?>"></script>
    <!-- custom scrollbar -->
    
    <script src="<?php echo site_url('../lib/slimScroll/jquery.slimscroll.js'); ?>"></script>
    <!-- fix for ios orientation change -->
    
    <script src="<?php echo site_url('../js/ios-orientationchange-fix.js'); ?>"></script>
    <!-- to top -->
    
    <script src="<?php echo site_url('../lib/UItoTop/jquery.ui.totop.min.js'); ?>"></script>
    <!-- mobile nav -->
    
    <script src="<?php echo site_url('../js/selectNav.js'); ?>"></script>


        
    <!-- globalize for jQuery UI-->
    
    <script src="<?php echo site_url('../lib/jquery-ui/external/globalize.js'); ?>"></script>
    <!-- masked inputs -->
    
    <script src="<?php echo site_url('../js/forms/jquery.inputmask.min.js'); ?>"></script>
    <!-- autosize textareas -->
    
    <script src="<?php echo site_url('../js/forms/jquery.autosize.min.js'); ?>"></script>
    <!-- textarea limiter/counter -->
    
    <script src="<?php echo site_url('../js/forms/jquery.counter.min.js'); ?>"></script>
    <!-- datepicker -->
    
    <script src="<?php echo site_url('../lib/datepicker/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- timepicker -->
    
    <script src="<?php echo site_url('../lib/timepicker/js/bootstrap-timepicker.min.js'); ?>"></script>
    <!-- tag handler -->
    
    <script src="<?php echo site_url('../lib/tag_handler/jquery.taghandler.min.js'); ?>"></script>
    <!-- styled form elements -->
    
    <script src="<?php echo site_url('../lib/uniform/jquery.uniform.min.js'); ?>"></script>
    <!-- animated progressbars -->
    
    <script src="<?php echo site_url('../js/forms/jquery.progressbar.anim.js'); ?>"></script>
    <!-- multiselect -->
    
    <script src="<?php echo site_url('../lib/multi-select/js/jquery.multi-select.js'); ?>"></script>
    
    <script src="<?php echo site_url('../lib/multi-select/js/jquery.quicksearch.js'); ?>"></script>
    <!-- enhanced select (chosen) -->
    
    <script src="<?php echo site_url('../lib/chosen/chosen.jquery.min.js'); ?>"></script>
    <!-- TinyMce WYSIWG editor -->
    
    <script src="<?php echo site_url('../lib/tiny_mce/jquery.tinymce.js'); ?>"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    
    <script src="<?php echo site_url('../lib/plupload/js/plupload.full.js'); ?>"></script>
    
    <script src="<?php echo site_url('../lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js'); ?>"></script>
    <!-- colorpicker -->
    
    <script src="<?php echo site_url('../lib/colorpicker/bootstrap-colorpicker.js'); ?>"></script>
    <!-- password strength checker -->
    
    <script src="<?php echo site_url('../lib/complexify/jquery.complexify.min.js'); ?>"></script>
    <!-- switch buttons -->
    
    <script src="<?php echo site_url('../lib/bootstrap-switch/static/js/bootstrap-switch.min.js'); ?>"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
    

    <!-- tooltip -->    
        <link rel="stylesheet" href="<?php echo site_url('../lib/qtip2/jquery.qtip.min.css'); ?>" />
    
    

        
        

        <script>

           $(document).ready(function(){

                var myElements = $(".checkboxThreeInput");

                for (var i=0;i<myElements.length;i++) {
                    myElements.eq(i).prop('id',myElements.eq(i).attr("name"));
                    var parentElement=$($( myElements.eq(i) ).parent().get( 0 ));
                    parentElement.find("label").prop("for",myElements.eq(i).attr("name"));
                }



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
