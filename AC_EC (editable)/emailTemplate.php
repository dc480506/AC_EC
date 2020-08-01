<?php
function getEmailTemplate($body, $to)
{
    return '
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto:100,200,300,400,500,700,800,900|Raleway:100" rel="stylesheet">
    <title>KJSCE ALLOCATION PORTAL</title>
    </head>
    
<body yahoo style="font-family:"Roboto", Sans-Serif; margin: 0; padding: 0; min-width: 100% !important; -webkit-font-smoothing: antialiased; letter-spacing: 0.33px">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; padding: 32px 0;">
        <tr>
        <td>
        <table align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 733px; background-color: #f1f1f1; border: 1px solid #dcdcdc;">
        <tr>
                        <td>
                        <table height="80px" style="width: 100%; background-color: white; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.14);">
                                <tr>
                                <td style="padding-left: 24px;">
                                        <img src="https://kjsce.somaiya.edu/assets/kjsce/img/newlogo/KJSCE-Logo.svg" width="200px">
                                        </td>
                                        <td align="right" style="padding-right: 24px; color: #848484;">
                                        <span style="height: 20px; line-height: 20px;">
                                        
                                        </span>
                                        <br>
                                        
                                        </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                <tr height="32px"></tr>
                                <tr>
                                <td>
                                <table align="center" style="width: 100%; max-width: 670px; border-top: 5px solid #b7202e; background-color: white; box-shadow: 0 6px 17px 0 rgba(0,0,0,0.04);">
                                <tr>
                                <td style="padding: 22px;">
                                        <h4>Dear ' . $to . '</h4>
                                        <p>' . $body . '</p>
                                    </td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                                <tr height="32px"></tr>
                                <tr>
                        <td>
                        <table align="center" style="width: 100%; max-width: 680px; border-top: 1.3px solid #dddddd; padding-bottom: 16px;">

                                <tr align="center">
                                <td style="color: #adadad; font-size: 13px; text-decoration: none; font-weight: 500; line-height: 18px; padding-top: 12px;">
                                        Sent by <span style="color: #4e4e4e; font-weight: 600;">KJ Somiaya College Of
                                        Engineering</span>
                                    </td>
                                    </tr>
                                <tr align="center">
                                <td>
                                        <a href="http://url6536.codingninjas.com/ls/click?upn=HWQn5awVFF-2FZNbrxzhMVBURdYTohh6Ku-2F6e86froyGqNEaagncOCQfFLR3h-2B5JcrfF37M7xZGnLmNbJKQm-2F-2BK2uj2wN2Ft6aitcSzJttKsB4bu6gNof-2F-2BsR1Z3HkUHB9LNUQztbw7WZTM29tdIOf2IFayZCP-2FI4iwrLdZdBQ272Qe-2B11gIDR3s30AxZtZepGh2nNO-2FFkHDNTgRlWDqQ-2BHA-3D-3DAMgT_H5hU9eiICbnJWf-2FZQkpsUOc83lpYojYYIxFKwKQvGfg8PcY9LcL5jFcLhpGZO-2BJvDfJ-2FFlPgPNMVLtMUrgA4erm27BqPkWhchZeMVjNRF51gGEH6fnG-2FW-2BRyLveCpYYKqNTA9QO-2Bs9PIdj3tOuqt7dzu5WAxOMI3OkeZhhslU8SVduWzCGAPOH6l-2F8x9gmaEbz1ump-2F6yGbPkfxq5wzCJ0zRNmPqmNJOdMAav2qoOwg-3D" target="_blank" style="color: #adadad; font-size: 13px; text-decoration: none; font-weight: 500; line-height: 18px;">
                                        <address style="font-style: normal;">Vidyanagar, VidyaVihar(East),
                                        Ghatkopar,
                                                <br>
                                                Mumbai, Maharashtra – 400 077.
                                            </address>
                                            </a>
                                            </td>
                                            </tr>
                                            </table>
                                            </td>
                                            </tr>
                </table>
                </td>
                </tr>
                </table>
                
                </body>
                
                </html>';
}
