<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Ticket Created</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  
  <link href='https://fonts.googleapis.com/css?family=Raleway:600,700,400' rel='stylesheet' type='text/css'>

  <!--  General CSS  -->
  <style type="text/css">
    html{
        width: 100%; 
    }

    body{
      width: 100%;  
      margin:0; 
      padding:0; 
      -webkit-font-smoothing: antialiased;
      mso-margin-top-alt:0px; 
      mso-margin-bottom-alt:0px; 
      mso-padding-alt: 0px 0px 0px 0px;
      background: #E7E7E7;
    }

    p,h1,h2,h3,h4{
      margin-top:0;
      margin-bottom:0;
      padding-top:0;
      padding-bottom:0;
    }

    table{
      font-size: 14px;
      border: 0;
    }

    img{
      border: none!important;
    }
  </style>

  <!--  Responsive CSS  -->
  <style type="text/css">
    @media only screen and (max-width: 800px) {
      body[yahoo] .quote_full_width {width:100% !important;}
      body[yahoo] .quote_content_width {width:90% !important;}
    }

    @media only screen and (max-width: 640px) {
      body[yahoo] .full_width {width:100% !important;}
      body[yahoo] .content_width{width:80% !important;}
      body[yahoo] .center_txt {text-align: center!important;}
      body[yahoo] .post_sep {width:100% !important; height:60px !important;}
      body[yahoo] .gal_sep {width:100% !important; height:40px !important;}
      body[yahoo] .gal_img {width:100% !important;}
      body[yahoo] .bb_space {height:90px !important;}
    }  
  </style>
</head>
<body style="margin: 0; padding: 0;" yahoo="fix">
  <!--  billboard  -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%" background="img/billboard.jpg" bgcolor="#2a3647" style="background-image:url('img/billboard.jpg'); background-size: cover; -webkit-background-size: cover; -moz-background-size: cover -o-background-size: cover; background-position: bottom center; background-repeat: no-repeat; background-color:#2a3647;">

    <!--  header  -->
    <tr>
      <td>
          <table width="600" cellpadding="0" cellspacing="0" align="center" border="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; border:0; text-align:center;" class="content_width">    
            <!--  spacing  -->
            <tr>
              <td width="100%" height="40">&nbsp;</td>
            </tr>
            <!--  end spacing  -->

            <!--  Logo  -->
            <tr> 
              <td>
                <img src="https://app.mightyfinance.co.zm/public/web/images/01-ft-logo.png" width="" height="27" alt="" title="" border="0" style="border:0; display:inline_block;"/>
              </td>
            </tr>
            <!--  end logo  -->

            <!--  spacing  -->
            <tr>
              <td width="100%" height="40">&nbsp;</td>
            </tr>
            <!--  end spacing  -->

            <!--  vertical separator  -->
            <tr>
              <td>
                <table width="600" height="1" align="center" bgcolor="#343f53" border="0"  cellpadding="0" cellspacing="0"style="height:1px!important; width:600px; background-color:#343f53; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                  <tr>
                    <td></td>
                  </tr>
                </table>
              </td>
            </tr>
            <!--  end vertical separator  -->
          </table>
      </td>
    </tr>
    <!--  end header  -->
    
    <!--  spacing  -->    
      <tr>
        <td height="80">&nbsp;</td>
      </tr>
    <!--  end spacing  -->

    <!--  caption  -->
    <tr>
      <td>
        <table width="600" cellpadding="0" cellspacing="0" align="center" class="content_width" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"> 
          <tr>
            <td>
              <table width="450" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="content_width" align="left">
                <tr>
                  @if($data['type'] == 'user')
                    <h2 style="color: #fff; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 18px;">Thank you for submitting your issue.</h2>
                    <br><br><br><br><br><br>
                    <td style="color: #fff; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 34px; font-weight: 700; text-transform: uppercase; line-height:50px; letter-spacing:1px;">Your Ticket No. {{ $data['id'] }}</td>
                  @else
                    <h2 style="color: #fff; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 18px;">You have received a new ticket from {{ $data['user'] }} {{ $data['user_email'] }}</h2>
                    <br><br><br><br><br><br>
                    <td style="color: #fff; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 34px; font-weight: 700; text-transform: uppercase; line-height:50px; letter-spacing:1px;">Ticket No. {{ $data['id'] }}</td>
                  @endif
                </tr>
                <tr>
                    <td>
                      <p style="color: #fff; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 18px;">
                        {{ $data['message'] }}
                      </p>
                    </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>          
      </td>
    </tr>
    <!--  end caption  -->
    
    <!--  spacing  -->    
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
    <!--  end spacing  -->

    <!--  download btn  -->
    <tr>
      <td>
        <table width="600" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="content_width">
          <tr>
            <td>
              <table width="200" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background: #f5a65b;" class="center">
                <tr>
                  <td width="100%" height="20"></td>
                </tr>
                <tr>
                  <td>               

                    <table width="100%" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; text-align:center;">
                      <tr>
                        <td align="center" style="text-align:center;">
                          <a href="https://app.mightyfinance.co.zm" style="display: block; width: 100%; color: #fff; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 700; text-decoration:none; letter-spacing:1px; text-transform:uppercase;">Back to App</a>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>
                <tr>
                  <td width="100%" height="20"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <!--  end download btn  -->   
    <!--  spacing  -->    
    <tr>
      <td height="200" width="100%">&nbsp;</td>
    </tr>
    <!--  end spacing  -->
  </table>
  
  <!--  footer  -->
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
    
    <tr>
      <td>
        <!--  footer top block  -->
        <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; border:0px;" class="content_width">

          <tr>
            <td>
              <table width="600" height="1" align="center" bgcolor="#e5e5e5" border="0"  cellpadding="0" cellspacing="0"style="height:1px!important; width:600px; background-color:#e5e5e5; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                <tr>
                  <td></td>
                </tr>
              </table>
            </td>
          </tr>
          <!--  end vertical separator  -->
        </table>
        <!--  end footer top block  -->

        <!--  footer bottom block  -->
        <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="content_width">
          <tr>
            <td width="100%" height="40"></td>
          </tr>
          <!--  end spacing  -->

          <!--  content  -->
          <tr>
            <td>
              <!--  copyrights  -->
              <table align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full_width center_txt">
                <tr>
                  <td style="color: #414d5f; font-family: 'Raleway', Helvetica, Arial, sans-serif; font-size: 12px; letter-spacing:.5px; font-weight: 400;">
                    © 2023 <a href="https://mightyfinance.co.zm/login" target="_blank" style="color: #414d5f; font-weight: 600; text-decoration:none;">mightyfinance.co.zm</a>. All Rights Reserved
                  </td>
                </tr>
              </table>
              <!--  end copyrights  -->

              <!--  spacing  -->
              <table height="40" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full_width">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <!--  end spacing  -->

              <!--  social media  -->
              <!--  end social media  -->
            </td>
          </tr>
          <!--  end content  -->

          <!--  spacing  -->
          <tr>
            <td width="100%" height="40">&nbsp;</td>
          </tr>
          <!--  end spacing  -->
        </table>
        <!--  end footer bottom block  -->
      </td>
    </tr>
  </table>
  <!--  end footer  -->

</body>
</html>