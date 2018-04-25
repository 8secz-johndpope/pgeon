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
                  <td align="center"><img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt ="Pgeon"/></td>
              </table>
            </div>

            <!-- END HEADER -->
            <table border="0" cellpadding="0" cellspacing="0" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;" width="100%">

  

              <!-- END NOTIFICATION BANNER -->

<!-- START MAIN CONTENT AREA --><tr>
                <td class="wrapper" style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">




 <table border="0" cellpadding="0" cellspacing="0" width="100%;">
                                        <tr>
                                            <td align="center">
                                               <h2 class="align-center" style="font-size: 18px; margin-bottom: 15px; color: #333; font-family: sans-serif; font-weight: 400; line-height: 1.4;">Membership billing receipt</h2>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%;">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td class="receipt-container" style="font-size:12px;">
                                                            <table class="receipt" border="0" cellpadding="0" cellspacing="0" width="100%;">
                                                                <tr class="receipt-subtle">
                                                                    <td  align="center" colspan="2" style="
   
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#aaa;font-size:10px; ">This email confirms that we’ve received your payment.</td>
                                                                </tr>
                                                                <tr >
                                                                    <td style="    
    font-size: 10px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#333;">Membership type:</td>
                                                                    <td style="    
    font-size: 10px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#333;">{{$type}}ly</td>
                                                                </tr>                                                                 

                                                                <tr >
                                                                    <td style="    
    font-size: 10px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#333;">Total amount billed:</td>
                                                                    <td style="    
    font-size: 10px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#333;">{{$inv_amt}}</td>
                                                                </tr>
                                                                <tr >
                                                                    <td style="font-size: 10px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#333;">Billing date:</td>
                                                                    <td style="    
    font-size: 10px;
    vertical-align: top;border-bottom: 1px solid #eee;
    margin: 0;
    padding: 5px;color:#333;">{{$billing_date}}</td>
                                                                </tr>                                                                 
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <p style="
                                                          font-size: 10px;
                                                          vertical-align: top;
                                                          margin: 0;
                                                          padding: 15px 0px;
                                                          color:#333;
                                                          text-align:center; ">Notice something wrong?         
                                                    <a  target="_blank">Contact our support team</a>
                                                </p>
                                            </td>
                                            <td>&nbsp;</td>
                                            
                                            
                                        </tr>
                                    </table>
                    
                        <tr>
                            <td align="center">
                                <a href="{{URL::asset('/')}}profile" target="_blank" style="background-color: #24c4bc;
    border-color: #24c4bc;
    color: #ffffff;
    border: solid 1px #24c4bc;
    border-radius: 4px;
    box-sizing: border-box;
    display: inline-block;
    font-size: 10px;
    margin: 0;
    padding: 8px 11px;
    text-decoration: none;
    text-transform: capitalize;">View My Account</a>
                            </td>
                        </tr>
                    <tr>
                        <td align="center">
                            <p style="font-size:10px;">Thanks for using pgeon!</p>
                        </td>
                    </tr>
                    
                            </td>
                            </tr>
                   <tr>
                 
                  </tr>
                
                              
</table>     
           
                <!-- START HEADER -->
            <div class="header" style="margin-bottom: 20px; Margin-top: 10px; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; min-width: 100%;" width="100%">
              <td align="center" style="color: #999999;
    font-size: 8px;">4988 W Broad St, Sugar Hill, GA 30518<br />
    <br /><br />© 2017 Pgeon, Inc.</td>
              </table>
            </div>

<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td style="font-family: 'Open Sans', sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;

        
        </td>
          
      </tr>
    </table>









  












