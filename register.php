<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register Now!</title>
    <!-- Custom fonts for this template-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
            animation: slide-up 0.5s ease;
        }
        @keyframes slide-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            outline: none;
            color: #fff;
            font-weight: 600;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .login-link {
            font-size: 14px;
            color: #777;
            margin-top: 20px;
            transition: color 0.3s ease-in-out;
        }
        .login-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h5 class="card-title">Tutor Registration</h5>
            <p class="card-text">Are you interested in becoming a tutor? Register now to share your expertise and help others succeed!</p>
            <a href="tutor/registration.php" class="btn btn-primary">Register as Tutor</a>
        </div>
        <div class="card">
            <h5 class="card-title">Tutee Registration</h5>
            <p class="card-text">Are you struggling in a particular subject? Register now to get matched with a qualified tutor and improve your grades!</p>
            <a href="tutee/registration.php" class="btn btn-primary">Register as Tutee</a>
</div>
</div>
<div class="login-link">Already have an account? <a href="login.php">Login here</a></div>
<!-- Add animations -->
<script>
// Add slide-up animation to cards
const cards = document.querySelectorAll('.card');
cards.forEach(card => {
card.classList.add('animate__animated', 'animate__fadeInUp');
});
// Add hover effect to buttons
const btns = document.querySelectorAll('.btn-primary');
btns.forEach(btn => {
btn.classList.add('animate__animated', 'animate__pulse');
});
// Add hover effect to login link
const loginLink = document.querySelector('.login-link a');
loginLink.classList.add('animate__animated', 'animate__heartBeat');
</script>

</body>
</html>