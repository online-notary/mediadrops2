<?php
    require(__DIR__."/smtp-config.php");
    $from = $_POST["email"];
    $first_name = $_POST["first_name"];
    $email = $_POST["email"];
    $company_name = $_POST["company_name"];
    $billing_address= $_POST["billing_address"];
    $billing_address_2 = $_POST["billing_address_2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $zip= $_POST["zip"];

    $emailcontent = '
    <!DOCTYPE html>
    <html>
    <head>
    <title>CHIROPRACTIC - Care for Back Pain</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */   
        table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */   
        img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */  
        /* RESET STYLES */    
        img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}  
        table{border-collapse: collapse !important;}  
        body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {
            /* ALLOWS FOR FLUID TABLES */
            .wrapper {
              width: 100% !important;
                max-width: 100% !important;
            }
            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            .logo img {
              margin: 0 auto !important;
            }
            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            .mobile-hide {
              display: none !important;
            }
            .img-max {
              max-width: 100% !important;
              width: 100% !important;
              height: auto !important;
            }
            /* FULL-WIDTH TABLES */
            .responsive-table {
              width: 100% !important;
            }
            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            .padding-copy {
                padding: 10px 5% 10px 5% !important;
                text-align: center;
            }
    
            .section-padding {
              padding: 50px 15px 50px 15px !important;
            }
        }
        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
    </style>
    </head>
    <body style="margin: 0 !important; padding: 0 !important;">
    
    <!-- ONE COLUMN SECTION -->
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="section-padding">
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                <tr>
                <td align="center" valign="top" width="500">
                <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <!-- COPY -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">First Name: '.$first_name.' </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Email: '.$email.'</td>
                                            </tr>
                                            <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Company Name: '.$company_name.'</td>
                                        </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Billing Address: '.$billing_address.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Billing Address 2: '.$billing_address_2.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">City: '.$city.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">State: '.$state.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Country: '.$country.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Zip: '.$zip.'
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    </body>
    </html>
    ';
    $PHPMailer->From = $from;
    $PHPMailer->Name = $first_name;

    $PHPMailer->AddAddress($sendemail); 
    //Change Subject for Order Form
    $PHPMailer->Subject = "The Software Launch - Order Form Submission";
    $PHPMailer->MsgHTML($emailcontent);
    if ($PHPMailer->Send()) {
        //echo 'SEND';
        $success=true;
    } else {
        $success=false;
    }
    $json_data = array('success' => $success);
    echo json_encode($json_data);
    exit();
?>