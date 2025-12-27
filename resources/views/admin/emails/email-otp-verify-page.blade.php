<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .otp-card {
            border-radius: 15px;
        }

        .otp-input {
            letter-spacing: 6px;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card otp-card shadow-lg">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Email Verification</h3>
                            <p class="text-muted">
                                Please enter the 6-digit OTP sent to your email
                            </p>
                        </div>

                        <form method="POST" action="/verify-email-otp">
                            @csrf

                            <div class="mb-3">
                                <input type="text" name="otp" class="form-control otp-input" placeholder="••••••"
                                    maxlength="6" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Verify OTP
                                </button>
                            </div>
                        </form>

                        {{-- <div class="text-center mt-3">
                            <small class="text-muted">
                                Didn’t receive the code? <a href="#" class="text-decoration-none">Resend</a>
                            </small>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
