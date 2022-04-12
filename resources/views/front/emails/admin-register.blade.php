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
<body bgcolor="#718096" style="margin: 0; padding: 0;background-color: #EDF2F7;">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 20px 0 30px 0;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
                <tr>
                    <td align="center" bgcolor="#17a2b8" style="padding: 10px 0 0 0;">
                        <img src="https://orientation.tamkine.org/wp-content/themes/complexe/assets/img/logo/logo.png" alt="Creating Email Orientation." width="100" height="70" style="display: block;" />
                    <!-- <img src="{{ asset('assets/img/TamtechSolutions.png') }}" alt="Tamtech Solutions" class="img-fluid"> -->

                        <h2 style="color: #153643; font-family: Arial, sans-serif;">JNVOA : Nouveau Inscription </h2>

                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 0px 30px 0px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">


                            <tr>
                                <td style="color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
                                    <p style="margin-bottom: 10px;">Bonjour,</p>
                                    <p>
                                        Nouveau Inscription: {{ $prenom.' '. $nom }}
                                    </p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#fff" style="padding: 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px;text-align: center;">
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
