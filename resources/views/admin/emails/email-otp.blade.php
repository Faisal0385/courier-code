<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="background:linear-gradient(135deg,#0d6efd,#6610f2); padding:30px; border-radius:10px 10px 0 0;">
                            <h1 style="color:#ffffff; margin:0;">Email Verification</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333;">

                            <p style="font-size:16px; margin-bottom:20px;">
                                Hello,
                            </p>

                            <p style="font-size:16px; margin-bottom:25px;">
                                Use the following One-Time Password (OTP) to verify your email address:
                            </p>

                            <!-- OTP Box -->
                            <div style="text-align:center; margin:30px 0;">
                                <span
                                    style="
                                    display:inline-block;
                                    background:#f1f3f5;
                                    padding:15px 30px;
                                    font-size:32px;
                                    font-weight:bold;
                                    letter-spacing:8px;
                                    color:#0d6efd;
                                    border-radius:8px;">
                                    {{ $otp }}
                                </span>
                            </div>

                            <p style="font-size:14px; color:#555;">
                                This OTP will expire in <strong>5 minutes</strong>.
                            </p>

                            <!-- Button -->
                            <div style="text-align:center; margin:30px 0;">
                                <a href="{{ route('verify-email-otp.page') }}"
                                    style="
                                   background:#0d6efd;
                                   color:#ffffff;
                                   text-decoration:none;
                                   padding:14px 28px;
                                   font-size:16px;
                                   border-radius:6px;
                                   display:inline-block;">
                                    Verify Email
                                </a>
                            </div>

                            <p style="font-size:14px; color:#777;">
                                If you did not request this verification, please ignore this email.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center"
                            style="padding:20px; background:#f8f9fa; font-size:13px; color:#999; border-radius:0 0 10px 10px;">
                            © {{ date('Y') }} Your Company. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
