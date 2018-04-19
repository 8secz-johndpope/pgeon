@extends('layouts.app-mail')

@section('content')
   


    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;" width="100%" bgcolor="#f6f6f6">
      <tr>
        <td style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top; Margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px;" width="580" valign="top">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>

            <!-- START HEADER -->
            <div class="header" style="margin-bottom: 20px; Margin-top: 10px; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; min-width: 100%;" width="100%">
              </table>
            </div>

            <!-- END HEADER -->
            <table border="0" cellpadding="0" cellspacing="0" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;" width="100%">

              <!-- START NOTIFICATION BANNER -->
              <tr>
                <td style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" class="alert alert-warning" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; min-width: 100%;" width="100%">
                    <tr>
                      <td align="center" style="font-family: 'Open Sans', sans-serif; vertical-align: top; font-size: 14px; border-radius: 3px 3px 0 0; color: #ffffff; font-weight: 500; padding: 20px; text-align: center; background-color: #f39c12;" valign="top" bgcolor="#f39c12">Receipt</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- END NOTIFICATION BANNER -->

<!-- START MAIN CONTENT AREA --><tr>
                <td class="wrapper" style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">




 <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>
                                                <h2 class="align-center" style="font-size: 15px;
    margin-bottom: 10px; ">Membership billing receipt</h2>
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td class="receipt-container" style="font-size:12px;">
                                                            <table class="receipt" border="0" cellpadding="0" cellspacing="0">
                                                                <tr class="receipt-subtle">
                                                                    <td colspan="2" class="align-center" style="    font-family: sans-serif;
    font-size: 11px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#aaa;font-size:11px;">This email confirms that we’ve received your payment.</td>
                                                                </tr>
                                                                <tr style="    font-family: sans-serif;
    font-size: 11px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#aaa;font-size:11px;">
                                                                    <td>Membership type:</td>
                                                                    <td class="receipt-figure">{{$type}}ly</td>
                                                                </tr>                                                                 

                                                                <tr style="    font-family: sans-serif;
    font-size: 11px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#aaa;font-size:11px;">
                                                                    <td>Total amount billed:</td>
                                                                    <td class="receipt-figure">{{$inv_amt}}</td>
                                                                </tr>
                                                                <tr style="    font-family: sans-serif;
    font-size: 11px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#aaa;font-size:11px;">
                                                                    <td>Billing date:</td>
                                                                    <td class="receipt-figure">{{$billing_date}}</td>
                                                                </tr>                                                                 

                                                               
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <p style="    font-family: sans-serif;
    font-size: 11px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#aaa;font-size:11px;text-align:center; ">Notice something wrong?         <a href="http://htmlemail.io" target="_blank">Contact our support team</a></p>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
</table>





  
            

<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>
  












