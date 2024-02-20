<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<script src="<?php echo base_url() . 'newAssets/js/'; ?>bootstrap.min.js"></script>-->

        <link rel="stylesheet" href="<?php echo base_url() ?>newAssets/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

        <title>This is Prescription Print</title>



        <style type="text/css">
            /* Styles go here */
            #data{font-size:16px;}
            .page-header-print, .page-footer-print, .page-header-space, .page-footer-space{ display: none; visibility: hidden; }
            .page-header-new{
                font-size: 12px;
                line-height: normal;
                color: #000;
                padding-bottom: 0.5rem;
                /** 
                height: 296px;
                margin-top: 52px;**/
                border-bottom: 1px solid #bdbdbd;
            }
            .page-header-new table td, .page-header-print table td{padding: 2px 5px;font-size: 18px;}

            .page-footer{
                height: 191px;
                border-top: 1px solid #dcdcdc;
                padding: 5px 0 0;
                margin-top: 1rem;

            } 
            .page-header-new p{
                margin: 0 0 5px;
            }

            .page {
                page-break-after: always;
                margin: 12px 0;
                /**position: relative;
                top: 0;**/
            }
            .page:last-child {
              page-break-after: auto;
            }
            .billing-table{
                border: 1px solid #d2d0d0;
            }
            .billing-table tbody td{padding: 29px 5px;}
            .billing-table td, .billing-table th{
                padding: 1px 5px;
            }
            .bank-dtail{
                margin: 20px 0 0;
            }
            .GP-table{}
            .GP-table tr th{
                text-align:center;
            }
            .GP-table tbody tr td{
                border: 1px solid black;
                padding: 5px;
                text-align:center;
            }
            .bank-dtail td p, .billing-table th p{ margin: 0; }
            @page {
                font-size: 14px;
            }

            @media print { 
                /** .cf-header{
                    position: fixed;
                     top: 0;
                     border-bottom: 1px solid #679782;
                     padding: 0 0 3px;
                     width: 578px;
                     margin: 0 auto;
                     left: 0;
                     right: 0;
                 }**/
                /**.cf-sign{
                    position: absolute;
                    bottom: 194px;
                    left: 50%;
                    width: 573px;
                    margin: 0 0 0 -286.5px;
                }
                .cf-footer{
                    padding: 20px 0;
                    margin: 0 0 0 -286.5px;
                    border-top: 2px solid #679782;
                    position: absolute;
                    left: 50%;
                    bottom: 0;
                    width: 573px;
                }**/
                .page-footer {
                    position: fixed;
                    bottom: 1rem;
                    width: 1000px;
                    margin: 0 auto;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    height: auto;
                    text-align: center;
                }
                .page-footer-space{
                    display: block;
                    height: 300px; 
                }

                table.special thead {display: table-header-group;}
                table.special tfoot {display: table-footer-group;} 

                button {display: none;}

                body {margin: 0;}
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <!--print invoice page--> 
                    <table  class="special" width="100%" style="margin: 0 auto;"> 

                        <thead>
                            <tr>
                                <td>
                                    <!--place holder for the fixed-position header-->
                                    <div class="page-header-space"></div>
                                    <div class="page-header-new" >
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <?php if(!empty($client_detail[0]['bill_header'])){?>
                                                        <tr>
                                                            <td><img style="width: 100%;height:3cm;" src="<?php echo base_url() ?>newAssets/img/uploads/logo_img/<?=$client_detail[0]['bill_header'];?>" alt="logo"></td>
                                                        </tr>
                                                    <?php } else {?>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <h3 style="color:blue;font-size: 18px;font-weight:bold;"><?php if(isset($client_detail[0]['hos_name'])){ echo $client_detail[0]['hos_name'];} else{ echo"";}?></h3>
                                                                <p style="width:250px;color: #679782;"><?php if(isset($client_detail[0]['address'])){ echo $client_detail[0]['address'];} else{ echo"";}?></p>
                                                                <p style="color: #679782;"><?php if(isset($client_detail[0]['email'])){ echo'Email : '. $client_detail[0]['email'];} else{ echo"";}?></p>
                                                                <p style="color: #679782;"><?php if(isset($client_detail[0]['contact_no'])){ echo'Contact : '. $client_detail[0]['contact_no'];} else{ echo"";}?></p>
                                                                   
                                                            </td>
                                                            <td valign="middle" align="right" width="35%">
                                                                <?php if(!empty($client_detail[0]['image_file'])) {?>
                                                            <img style="width: 34%;height:145px;" src="<?php echo base_url() ?>newAssets/img/uploads/logo_img/<?=$client_detail[0]['image_file'];?>" alt="logo">
                                                            <?php }?>
                                                            </td>
                                                        </tr>
                                                        <?php }?>
                                                    </table>
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                        <tr>
                                                            <?php
                                                            $validity;
                                                            $date = $appointment['appointment_date'];
                                                            $dat = date('l', strtotime($date . ' + ' . $validity . ' days'));
                                                            $date = date('d-m-Y', strtotime($date . ' + ' . $validity . ' days'));
                                                            ?>
                                                            <td align="left"><strong>Prescription Date : </strong><?php echo date('d-m-Y',strtotime($appointment['appointment_date'])); ?></td>
                                                            <!--<td align="right"><strong>Valid Till Date :</strong><?php echo $date; ?></td>--> 
                                                            <?php if ($validity != '') { ?>
                                                                <td align="right"><strong>Valid Till Date : </strong><?php echo date('d-m-Y', strtotime($date)); ?></td> 
                                                            <?php } else { ?>
                                                                <td align="right"><!--<strong>Valid Till Date :</strong>-->  </td> 
                                                            <?php } ?> 
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php if ($front_eye_data['progressive'] != '') { ?>
                                                    <td>
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td align="left"><strong>Note</strong> <?php echo $front_eye_data['progressive']; ?></td>  
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                            <?php if (($checkup_data['dob'] != '0000-00-00') || $checkup_data['salutation'] != '' || $checkup_data['name'] != '' || $checkup_data['gender'] != '' || $checkup_data['care_of_name'] != '') { ?>

                                            <table style="border-top: 1px solid #dcdcdc; margin: 8px 0 0;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                <?php
                                                                 $update_date=date('Y-m-d',strtotime($patient['updated_date']));
                                                                $inv_date=date('Y-m-d', strtotime($appointment['appointment_date']));
                                                              if(($patient['is_updated']==1) && ($update_date<=$inv_date)){ ?>
                                                                <tr>
                                                                    <?php
                                                                   $dob = $checkup_data['new_dob'];
                                                                    $birth_date = new DateTime("$dob"); // Your date of birth
                                                                    $today = new Datetime(date('Y-m-d', strtotime($appointment['appointment_date'])));
                                                                    $diff = $today->diff($birth_date);
                                                                    //$age = $diff->y . '&nbspYear' . $diff->m . '&nbspMonths' . $diff->d . '&nbspDays';
                                                                    if($checkup_data['new_age']==0)
                                                                    {
                                                                        $newage =$diff->m . 'M-'.$diff->d.'D';
                                                                    } else {
                                                                    $newage = $diff->y . 'Y-'. $diff->m . 'M-'.$diff->d.'D';
                                                                    }
                                                                    ?>

                                                                    <td valign="top" align="left" width="18%"><strong>Patient Details</strong></td>
                                                                    <td valign="top"> :</td>
                                                                    <td valign="top" ><?php echo $patient['new_salutation'] . $patient['new_name'] . ' / ' . $patient['new_gender'] . ' / ' . $newage; ?> ( <?=$patient['patient_id']?> )
                                                                <br>
                                                                <?php echo $patient['new_care_of_name']; ?>
                                                                <br>
                                                                <?php echo $patient['new_address']; ?>
                                                                </td>
                                                                </tr>
                                                                <?php } else {?>
                                                                <tr>
                                                                    <?php
                                                                    $dob = $checkup_data['dob'];
                                                                    $birth_date = new DateTime("$dob"); // Your date of birth
                                                                    $today = new Datetime(date('Y-m-d', strtotime($appointment['appointment_date'])));
                                                                    $diff = $today->diff($birth_date);
                                                                    //$age = $diff->y . '&nbspYear' . $diff->m . '&nbspMonths' . $diff->d . '&nbspDays';
                                                                    if($checkup_data['age']==0)
                                                                    {
                                                                        $age =$diff->m . 'M-'.$diff->d.'D';
                                                                    } else {
                                                                    $age = $diff->y . 'Y-'. $diff->m . 'M-'.$diff->d.'D';
                                                                    }
                                                                    ?>

                                                                    <td valign="top" align="left" width="18%"><strong>Patient Details</strong></td>
                                                                    <td valign="top"> :</td>
                                                                    <td valign="top" ><?php echo $checkup_data['salutation'] . $checkup_data['name'] . ' / ' . $checkup_data['gender'] . ' / ' . $age; ?> ( <?=$patient['patient_id']?> )
                                                                <br>
                                                                <?php echo $checkup_data['care_of_name']; ?>
                                                                <br>
                                                                <?php echo $patient['address']; ?>
                                                                </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </table> 
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                             <tbody>
                            <tr>
                                <td style="padding: 2px 10px;">
                                    <!--*** CONTENT GOES HERE ***--> 
                                    <div class="page"> 
                                        <table style="border-top: none; margin: 8px 0 0;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <?php if (($front_eye_data['complaint'] != '') || ($front_eye_data['complaint_day'] != '') || ($front_eye_data['complaint_duration'] != '') || ($front_eye_data[' complaint_comment'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">

                                                                <tr>
                                                                    <td width="18%" valign="top" align="left"><strong>Complaint</strong></td>
                                                                    <td width="2%" valign="top"> :</td>
                                                                    <td valign="top" >
                                                                        <?php
                                                                        if ($front_eye_data['complaint'] != '') {
                                                                            echo $front_eye_data['complaint'];
                                                                        }
                                                                        if ($front_eye_data['complaint_duration'] != '')
                                                                            echo '&nbsp;/&nbsp;';
                                                                        if ($front_eye_data['complaint_duration'] != '')
                                                                            echo $front_eye_data['complaint_day'];
                                                                        echo '&nbsp;&nbsp;';
                                                                        echo $front_eye_data['complaint_duration'];
                                                                        if ($front_eye_data['complaint_comment'] != '')
                                                                            echo '&nbsp;/&nbsp;';
                                                                        if ($front_eye_data['complaint_comment'] != '') {
                                                                            echo $front_eye_data['complaint_comment'];
                                                                        }
                                                                        ?>

                                                                    </td>
                                                                </tr> 

                                                            </table> 
                                                        </td>
                                                    </tr>
                                <?php } ?>
                               
                                               
                                                <?php if (($front_eye_data['re_ph'] != '') || ($front_eye_data['le_ph'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>BCVA</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                          
                                                                                <?php if ($front_eye_data['re_ph'] != '') { ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_ph']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['le_ph'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_ph']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                ?> 
                                                                        <td></td>
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['re_near_vision'] != '') || ($front_eye_data['le_near_vision'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>POG</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['re_near_vision'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_near_vision']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['le_near_vision'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_near_vision']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                ?> 
                                                                        <td></td>
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['iop_re'] != '') || ($front_eye_data['iop_le'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>IOP</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                          
                                                                                <?php if ($front_eye_data['iop_re'] != '') { ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    RE : <span id="data"><?php echo $front_eye_data['iop_re']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['iop_le'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    LE : <span id="data"><?php echo $front_eye_data['iop_le']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                ?> 
                                                                        <td></td>
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['cct_re'] != '') || ($front_eye_data['cct_le'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>CCT</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['cct_re'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['cct_re']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['cct_le'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['cct_le']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                ?> 
                                                                        <td></td>
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['be_fundus'] != '') || ($front_eye_data['re_fundus'] != '') || ($front_eye_data['le_fundus'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Fundus</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                          
                                                                                <?php if ($front_eye_data['be_fundus'] != '') { ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_fundus']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_fundus'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_fundus']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_fundus'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%"> 
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_fundus']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['be_ophthalmoscopy'] != '') || ($front_eye_data['re_ophthalmoscopy'] != '') || ($front_eye_data['le_ophthalmoscopy'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Ophthalmoscopy</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_ophthalmoscopy'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_ophthalmoscopy']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_ophthalmoscopy'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_ophthalmoscopy']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_ophthalmoscopy'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_ophthalmoscopy']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['be_macula'] != '') || ($front_eye_data['re_macula'] != '') || ($front_eye_data['le_macula'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Macula</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_macula'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_macula']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_macula'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_macula']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_macula'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_macula']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                <?php if (($front_eye_data['be_periphery'] != '') || ($front_eye_data['re_periphery'] != '') || ($front_eye_data['le_periphery'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Periphery</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_periphery'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_periphery']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_periphery'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_periphery']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_periphery'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_periphery']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                       <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['be_ocular_edenxa'] != '') || ($front_eye_data['re_ocular_edenxa'] != '') || ($front_eye_data['le_ocular_edenxa'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>External Exam</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_ocular_edenxa'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_ocular_edenxa']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_ocular_edenxa'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_ocular_edenxa']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_ocular_edenxa'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_ocular_edenxa']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['be_disc'] != '') || ($front_eye_data['re_disc'] != '') || ($front_eye_data['le_disc'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Disc</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_disc'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_disc']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_disc'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_disc']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_disc'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_disc']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                <?php if (($front_eye_data['be_impression'] != '') || ($front_eye_data['re_impression'] != '') || ($front_eye_data['le_impression'] != '') || ($front_eye_data['impression_comment'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Impression</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_impression'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_impression']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_impression'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_impression']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_impression'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_impression']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                
                                                                                
                                                                        <td></td>
                                                                </tr>
                                                                <tr>
                                                                
                                                                    <?php if ($front_eye_data['impression_comment'] != '') {
                                                                                    ?>
                                                                                    <td width="18%" valign="top"> <strong>Comment</strong></td>
                                                                <td valign="top" width="2%"> : </td>
                                                                                    <td valign="top" width="20%">
                                                                                    <span id="data"><?php echo $front_eye_data['impression_comment']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if (($front_eye_data['be_prognosis'] != '') || ($front_eye_data['re_prognosis'] != '') || ($front_eye_data['le_prognosis'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Prognosis</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['be_prognosis'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    BE : <span id="data"><?php echo $front_eye_data['be_prognosis']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['re_prognosis'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    RE : <span id="data"><?php echo $front_eye_data['re_prognosis']; ?></span>
                                                                                    </td>
                                                                                   <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                                <?php if ($front_eye_data['le_prognosis'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    LE : <span id="data"><?php echo $front_eye_data['le_prognosis']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                        
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                 <?php 
                                                 if($front_eye_data!='')
                                                 {
                                                    $result = 1;
                                                    $filter[0]['id'] = 'is_deleted';
                                                    $filter[0]['value'] = 0;
                                                    $filter[1]['id'] = 'crid';
                                                    $filter[1]['value'] = $checkup_data['id'];                                       
                                                    $req = array('risk','risk_description');
                                                    $checkup_risks = $this->Main_model->get_many_records('checkup_risks_print', $filter, $req,'id');
                                                    if(($checkup_risks != '' && !empty($checkup_risks))) {
                                                                    ?>         
                                                      <tr>
                                                        <td valign = "top">
                                                           <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0">
                                                                 <?php foreach ($checkup_risks as $k=>$value) { if($value['risk']!='')
                                                                            {
                                                                                if($k==0)
                                                                                {
                                                                                echo '<tr><td valign = "top" width="18%"><strong>Background 11</strong></td><td width="2%">:</td>';
                                                                                }
                                                                                else{
                                                                                echo '<td valign = "top" width="18%"></td><td width="2%"></td>';    
                                                                                }
                                                                                echo '<td>' . $value['risk'] . ": ".$value['risk_description']. '</td>';
                                                                                echo '</tr>';
                                                                                $i++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </table>
                                                                     
                                                        </td>
                                                    </tr>
                                            <?php } }?>
                                                
                                                <?php if (($front_eye_data['background'] != '') || ($front_eye_data['background_comment'] != '')) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                <tr>
                                                                        <td width="18%" valign="top"> <strong>Background</strong></td>
                                                                        <td valign="top" width="2%"> : </td>
                                                                           
                                                                                <?php if ($front_eye_data['background'] != '') { ?>
                                                                                    <td valign="top" width="25%">
                                                                                    <span id="data"><?php echo $front_eye_data['background']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }?>
                                                                                <?php if ($front_eye_data['background_comment'] != '') {
                                                                                    ?>
                                                                                    <td valign="top" width="25%">
                                                                                    Comment : <span id="data"><?php echo $front_eye_data['background_comment']; ?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?> 
                                                                        <td></td>
                                                                        <td></td>
                                                                        
                                                                        
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                if (($front_eye_data['re_spherical'] != '') || ($front_eye_data['le_spherical'] != '') || ($front_eye_data['re_cylindrical'] != '') || ($front_eye_data['le_cylindrical'] != '') || ($front_eye_data['re_axis'] != '') || ($front_eye_data['le_axis'] != '') || ($front_eye_data['re_near_add'] != '') || ($front_eye_data['le_near_add'] != '') || ($front_eye_data['vision_near_re'] != '') || ($front_eye_data['vision_near_le'] != '') || ($front_eye_data['bcva_re'] != '') || ($front_eye_data['bcva_le'] != '') || ($front_eye_data['pd'] != '') || ($front_eye_data['pd1'] != '')) {
                                                    $col = 0;
                                                    ?>
                                                    <tr>
                                                        <td valign = "top">
                                                            <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0" >
                                                                <tr>
                                                                    <td valign = "top" width="18%">
                                                                        <strong>Glass Prescription</strong>
                                                                    </td>
                                                                    <td valign = "top" width="2%"> : </td>
                                                                    <td style="float:left;">
                                                                        <table class = "GP-table" width = "80%" cellspacing = "3" cellpadding = "3" border = "0" style = "font-size: 13px; margin-top: 0.3rem; margin-right: auto;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>&nbsp;
                                                                                    </th>
                                                                                    <?php
                                                                                    if (($front_eye_data['re_spherical'] != '') || ($front_eye_data['le_spherical'] != '')) {
                                                                                        ?>
                                                                                        <th>Spherical</th>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_cylindrical'] != '') || ($front_eye_data['le_cylindrical'] != '')) {
                                                                                        ?>
                                                                                        <th>Cylindrical</th>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_axis'] != '') || ($front_eye_data['le_axis'] != '')) {
                                                                                        ?>
                                                                                        <th>Axis</th>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_near_add'] != '') || ($front_eye_data['le_near_add'] != '')) {
                                                                                        ?>

                                                                                        <th>Near Add</th>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['vision_near_re'] != '') || ($front_eye_data['vision_near_le'] != '')) {
                                                                                        ?>
                                                                                        <th>Vision Dist.</th>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['bcva_re'] != '') || ($front_eye_data['bcva_le'] != '')) {
                                                                                        ?>
                                                                                        <th>Vision Near</th>
                                                                                    <?php } ?>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>RE</th>
                                                                                    <?php
                                                                                    if (($front_eye_data['re_spherical'] != '') || ($front_eye_data['le_spherical'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['re_spherical']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_cylindrical'] != '') || ($front_eye_data['le_cylindrical'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['re_cylindrical']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_axis'] != '') || ($front_eye_data['le_axis'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['re_axis']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_near_add'] != '') || ($front_eye_data['le_near_add'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['re_near_add']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['bcva_re'] != '') || ($front_eye_data['bcva_le'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['bcva_re']; ?></span></td>
                                                                                    <?php 
                                                                                    }
                                                                                    if (($front_eye_data['vision_near_re'] != '') || ($front_eye_data['vision_near_le'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['vision_near_re']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>LE</th>
                                                                                    <?php
                                                                                    if (($front_eye_data['re_spherical'] != '') || ($front_eye_data['le_spherical'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['le_spherical']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_cylindrical'] != '') || ($front_eye_data['le_cylindrical'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['le_cylindrical']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_axis'] != '') || ($front_eye_data['le_axis'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['le_axis']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['re_near_add'] != '') || ($front_eye_data['le_near_add'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['le_near_add']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    if (($front_eye_data['bcva_re'] != '') || ($front_eye_data['bcva_le'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['bcva_le']; ?></span></td>
                                                                                    <?php 
                                                                                    }
                                                                                    if (($front_eye_data['vision_near_re'] != '') || ($front_eye_data['vision_near_le'] != '')) {
                                                                                        ?>
                                                                                        <td style="width:130px;"><span id="data"><?php echo $front_eye_data['vision_near_le']; ?></span></td>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </tr>
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <?php if (($front_eye_data['pd'] != '') || ($front_eye_data['pd1'] != '')) { ?>
                                                                                    <tr>
                                                                                        <th>&nbsp;
                                                                                        </th>
                                                                                        <td>PD:<span id="data"><?php echo $front_eye_data['pd'] ?></span></td>
                                                                                        <td colspan = "5">Glass Quality:<span id="data"><?php echo $front_eye_data['pd1'] ?></span></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tfoot>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <!--print sequence content row section-->
                                                <?php if (($front_eye_data['$retina_data'] != '') || ($retina_data['ffa'] != '') || ($retina_data['oct'] != '') || ($retina_data['oct_a'] != '') || (($retina_data[' plan']) != '') || ((!empty($retina_inv_data)))) {
                                                    ?>
                                                    <tr>
                                                        <td  valign="top">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                                                                
                                                                    <?php if ($retina_inv_data[0]['select1']!='') {
                                                                        ?>
                                                                        <tr>
                                                                        <td width="18%" valign="top"> 
                                                                        <strong>Investigation</strong></td>
                                                                        <td width="2%">  </td>
                                                                        <td></td>
                                                                        </tr>
                                                                            <?php
                                                                                $i = 1;

                                                                                foreach ($retina_inv_data as $value) {
                                                                                if($value['select1']){
                                                                                echo '<tr>
                                                                                <td width="18%" valign="top" align="left"><span id="data">' . $i . '. ' . $value['select1'] .'</span></td>
                                                                                <td width="2%" valign="top" align="left"><span id="data"> : </span></td>
                                                                                <td valign="top" align="left"><span id="data">'. $value['select2'] . '-' . $value['value'] . '</span></td>
                                                                            </tr>';
                                                                                } else {
                                                                                echo ' <tr>
                                                                                <td width="18%" valign="top" align="left"><span id="data"></span></td>
                                                                                <td width="2%" valign="top" align="left"><span id="data"></span></td>
                                                                                <td valign="top" align="left"><span id="data"></span></td>
                                                                                </tr>';
                                                                                }
                                                                                    $i++;
                                                                                }?>
                                                                        

                                                                        <?php
                                                                    }                                                                
                                                                    ?>
                                                                   <?php
                                                                            if ($retina_data[' plan'] != '') {
                                                                                ?>
                                                                                <tr>
                                                                                    <td width="18%" valign="top" align="left"><strong>Investigation Advised</strong></td>
                                                                                    <td width="2%" valign="top"> :</td>
                                                                                    <td valign="top" ><span id="data"><?php echo $retina_data['plan']; ?></span></td>
                                                                                </tr>
                                                                                <?php
                                                                            }                                                                           
                                                                            ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php 
                                                //print_r($retina_data);
                                                $i=1; 
                                                if(($retina_data['bcva_re'] != '') || ($retina_data['bcva_le'] != '') || ($retina_data['bcva_re_date'] != '') || ($retina_data['bcva_le_date'] != '') || ($retina_data['iop_re'] != '') || ($retina_data['iop_le'] != '') || ($retina_data['cornea_re'] != '') || ($retina_data['cornea_le'] != '') || ($retina_data['lens_re'] != '') || ($retina_data['lens_le'] != '') || ($retina_data['media_re'] != '') || ($retina_data['media_le'] != '') || ($retina_data['optic_nerve_re'] != '') || ($retina_data['optic_nerve_le'] != '') || ($retina_data['macula_re'] != '') || ($retina_data['macula_le'] != '') || ($retina_data['blood_vessels_re'] != '') || ($retina_data['blood_vessels_le'] != '') || ($retina_data['retinal_periphery_re'] != '') || ($retina_data['retinal_periphery_le'] != '')){?>
                                                <tr>
                                                    <td valign = "top">
                                                        <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0" >
                                                            <tr>
                                                                <td valign = "top">
                                                                    
                                                                    <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0" style = "font-size: 13px;">
                                                                    <tr>
                                                                       <td width="18%"><strong style="font-size:16px;">Examination</strong></td>
                                                                       <td width="2%">  </td>
                                                                       <td width="25%"><span style="font-size:16px;">RE</span></td>
                                                                       <td width="10%"></td>
                                                                       <td width="25%"><span style="font-size:16px;">LE</span></td>
                                                                       <td></td>
                                                                        </tr>
                                                                        <?php if (($retina_data['bcva_re'] != '') || ($retina_data['bcva_le'] != '')) {
                                                                            ?>
                                                                            
                                                                            <tr>

                                                                                <td  valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Best Corrected Visual Acuity(BCVA) </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['bcva_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['bcva_le']; ?></span></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['bcva_re_date'] != '') || ($retina_data['bcva_le_date'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Date </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['bcva_re_date']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['bcva_le_date']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['iop_re'] != '') || ($retina_data['iop_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.IOP(mm of hg by NCT) </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['iop_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['iop_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['cornea_re'] != '') || ($retina_data['cornea_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Cornea </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['cornea_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['cornea_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['lens_re'] != '') || ($retina_data['lens_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Lens </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['lens_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['lens_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['media_re'] != '') || ($retina_data['media_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Media </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['media_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['media_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['optic_nerve_re'] != '') || ($retina_data['optic_nerve_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Optic Nerve </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['optic_nerve_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['optic_nerve_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['macula_re'] != '') || ($retina_data['macula_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Macula </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['macula_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['macula_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['blood_vessels_re'] != '') || ($retina_data['blood_vessels_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Blood Vessels </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['blood_vessels_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['blood_vessels_le']; ?><span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        if (($retina_data['retinal_periphery_re'] != '') || ($retina_data['retinal_periphery_le'] != '')) {
                                                                            ?>

                                                                            <tr>

                                                                                <td valign = "top" width="18%"><span id="data"><?php echo $i++; ?>.Retinal Periphery </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['retinal_periphery_re']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['retinal_periphery_le']; ?></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                        <?php }
                                                                        if($retina_data['content'] != '') {
                                                                            ?>
    
                                                                            <tr>
    
                                                                                <td valign = "top" width="18%"><span id="data"><b>Retina Notes</b> </span></td>
                                                                                <td width="2%"> : </td>
                                                                                <td valign = "top" width="25%"><span id="data"><?php echo $retina_data['content']; ?></span></td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"><span id="data"></span></td>
                                                                                <td></td>
                                                                                
                                                                            </tr>   
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <?php if ($checkup_data['is_circle'] == 'yes') { ?>
                                                                        <tr>
                                                                            <td valign = "top" width="18%"><strong style="font-size:16px;">Examination</strong></td>
                                                                            <td width="2%">  </td>
                                                                            <td valign = "top" width="25%" style="font-size:16px;">OD</td>
                                                                            <td width="10%"></td>
                                                                            <td valign = "top" width="25%" style="font-size:16px;">OS</td>
                                                                            <td></td>
                                                                        </tr>
                                                                            <tr>
                                                                                <td valign = "top" width="18%"></td>
                                                                                <td width="2%">  </td>
                                                                                <td valign = "top" width="25%"> <img src="<?php echo base_url() ?>newAssets/img/circle_r.png" class="img-fluid d-inline-block align-top" alt="">
                                                                                </td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"> <img src="<?php echo base_url() ?>newAssets/img/circle_r.png" class="img-fluid d-inline-block align-top" alt="">
                                                                                </td>
                                                                                <td></td>
                                                                                
                                                                            </tr>
                                                                        
                                                                       
                                                                       <?php } ?>
                                                                    </table>
                                                    </td>
                                                </tr>
                                                <?php } else {?>
                                                <tr>
                                                    <td valign = "top">
                                                        <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0" >
                                                                                                                                <?php if ($checkup_data['is_circle'] == 'yes') { ?>
                                                                        
                                                                        <tr>
                                                                            <td valign = "top" width="18%"><strong>Examination</strong></td>
                                                                            <td width="2%">  </td>
                                                                            <td valign = "top" width="25%">OD</td>
                                                                            <td width="10%"></td>
                                                                            <td valign = "top" width="25%">OS</td>
                                                                            <td></td>
                                                                        </tr>   
                                                                            <tr>
                                                                                <td valign = "top" width="18%"></td>
                                                                                <td width="2%">  </td>
                                                                                <td valign = "top" width="25%"> <img src="<?php echo base_url() ?>newAssets/img/circle_r.png" class="img-fluid d-inline-block align-top" alt="">
                                                                                </td>
                                                                                <td width="10%"></td>
                                                                                <td valign = "top" width="25%"> <img src="<?php echo base_url() ?>newAssets/img/circle_r.png" class="img-fluid d-inline-block align-top" alt="">
                                                                                </td>
                                                                                <td></td>
                                                                                
                                                                                
                                                                            </tr>
                                                                       
                                                                         
                                                                        <?php } ?>
                                                                    
                                                        </table>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                        </table>
                                </td>
                            </tr>
                            <!--content row section-->
                            <?php
                            $filters[0]['id'] = "is_deleted";
                            $filters[0]['value'] = 0;
                            $filters[1]['id'] = "cpid";
                            $filters[1]['value'] = $checkup_data['id'];

                            $req = array('*');

                            $ad_detail = $this->Main_model->get_many_records("checkup_advice_dose_print", $filters, $req, "");
//                            echo '<pre>';
//                            print_r($fee_detail);
                            if (!empty($ad_detail)) {
                                ?>
                                <tr>
                                    <td valign = "top">
                                        <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0">
                                            <tr>
                                                <td valign = "top" width="18%"><strong>Advice</strong></td>
                                                <td width="2%">  </td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $i = 1;
                                            foreach ($ad_detail as $value) {
                                                echo '<tr>
                                                <td valign = "top" width="18%"></td>
                                                <td width="2%">  </td>
                                                <td valign = "top"><span id="data">' . $i . '. ' . $value['advice'] . '</span></br>
                                                    
                                                <span id="data">';
                                                    if(!empty($value['dose'])){echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$value['dose'];}  
                                                echo '</span></td></tr> ';
                                                $i++;
                                            }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $filtersd[0]['id'] = "is_deleted";
                            $filtersd[0]['value'] = 0;
                            $filtersd[1]['id'] = "cpid";
                            $filtersd[1]['value'] = $checkup_data['id'];
                            $filtersd[2]['id'] = "p_id";
                            $filtersd[2]['value'] = $checkup_data['p_id'];
                            $req = array('*');
                            $icd_detail = $this->Main_model->get_many_records("checkup_diagnosis_icd_print", $filtersd, $req, "");
                            //  echo '<pre>';
                            //  print_r($fee_detail);
                            if (!empty($icd_detail)) {
                                ?>
                                         <tr>
                                    <td valign = "top">
                                        <table style="margin-left:10px;" width = "100%" cellspacing = "0" cellpadding = "0" border = "0">
                                            <tr >
                                                <td valign = "top" width="18%"><strong>Diagnosis</strong></td>
                                                <td width="2%">  </td>
                                                <td>
                                            <?php
                                            $i = 1;
                                            foreach ($icd_detail as $value) {
                                                 echo '<tr>
                                                <td valign = "top" width="18%"></td>
                                                <td width="2%">  </td>
                                                <td valign = "top"><span id="data">' . $value['diagnosis'] . ": ".$value['icd']. '</span></br>
                                                    
                                                <span id="data">';
                                                echo '</span></td></tr> ';
                                                $i++;
                                              }
                                            ?>
                                            </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                        <?php } ?>
                            <?php if (!empty($front_eye_data['followup_date'])) {
                                ?>
                                <tr>
                                    <td valign = "top">
                                        <table width = "100%" cellspacing = "0" cellpadding = "0" border = "0" style = "margin: 1rem 0 0;">
                                            <tr>
                                                <td valign = "top" width="15%"><strong>Follow Up date</strong></td>
                                                    <td valign = "top">&nbsp<span id="data"><?php echo date('d-m-Y', strtotime($front_eye_data['followup_date'])); ?></span></td>
                                                

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!--content row section end-->

                        </tbody>
                    </table>

                </div>
                <!--div class = "page">Page 2 </div-->
                </td>
                </tr>
                <tr>
                    <td>
                    <div class="col-md-12">
                    <p style = "text-align: right;"><?php echo $doctor['name']; ?></p>
                    </div>
                    </td>
                </tr>
                </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <div class = "page-footer-space"></div>
                                <div class = "page-footer" style="width:100%">
                                    
                                    <?php if(!empty($client_detail[0]['bill_footer'])){?>
                                    <img style="width: 100%;height:3cm;" src="<?php echo base_url() ?>newAssets/img/uploads/logo_img/<?=$client_detail[0]['bill_footer'];?>" alt="logo">
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    </table>

                </div>
            </div>
        </div>

        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?php echo base_url() . 'newAssets/js/'; ?>jquery.3.3.1.min.js"></script>
        <script src="<?php echo base_url() . 'newAssets/js/'; ?>popper.min.js"></script>
        <script src="<?php echo base_url() ?>newAssets/js/bootstrap.min.js"></script>

 <!--<script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous"></script>-->
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
     <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
</body>
</html>
