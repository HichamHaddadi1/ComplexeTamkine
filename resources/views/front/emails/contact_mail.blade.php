<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Orientation Tamkine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css">
        a[x-apple-data-detectors] {color: inherit !important;}
    </style>

</head>
<body bgcolor="#718096" style="margin: 0; padding: 0;background-color: #fff;">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 20px 0 30px 0;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="    border-radius: 15px; border: 1px solid #cccccc;">
                <tr>
                    <td align="center" style="padding: 10px 0 15px 0; border-radius: 15px 15px 0 0;" bgcolor="#EDF2F7">
                        <img src="https://bourse.tamkine.org/images_locale/logo2.png" alt="Creating Email Orientation." width="120" height="100" style="display: block;" />
                    <!-- <img src="{{ asset('assets/img/TamtechSolutions.png') }}" alt="Tamtech Solutions" class="img-fluid"> -->

                        <!-- <h2>Orientation</h2> -->

                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 10px 30px 0px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif;">
                                    <h1 style="font-size: 26px; margin: 0 0 5px 0;">Salut, Fondation Tamkine</h1>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #8d989c; font-family: Arial, sans-serif;">
                                    <h4 style="font-size: 14px; margin: 0 0 5px 0;">nous avons un prospect pour vous.</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:#8d989c; font-family: Arial, sans-serif;">
                                    <h4 style="font-size: 14px; margin: 0 0 18px 0;">voir le détail de l'utilisateur ci-dessous.</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                        <tr>
                                            <td width="260" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                    <tr>
                                                        <td style="color: #8d989c; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 0 0 0 0;width: 130px; text-align: right;">
                                                            Nom et Prénom :
                                                        </td>
                                                        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 0 5px 0 0;	text-align: left;">
                                                            <p style="margin: 0;">{{ $data['nom'].' '.$data['prenom'] }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                        <tr>
                                            <td width="260" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                    <tr>
                                                        <td style="color: #8d989c; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 0 5px 0 0;width: 130px; text-align: right;">
                                                            E-mail :
                                                        </td>
                                                        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 0 0 0 0; text-align: left;">
                                                            <p style="margin: 0;">{{ $data['email'] }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
                                    <p style="color: #8d989c; font-family: Arial, sans-serif; font-size: 16px; line-height: 0px; padding: 0 0 0 0;">Message :</p>
                                    <p style="margin: 0;">{{ $data['msg'] }}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ee4c50" style="padding: 10px 30px; border-radius: 0 0 15px 15px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
                                    <p class="text-center" style="margin: 0;">&reg; Orientation Tamkine  {{ now()->year }}<br/>
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
</html>
