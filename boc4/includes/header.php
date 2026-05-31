<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood On Click - Blood Donation Management System</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            font-family: 'Segoe UI', sans-serif;
        }

        .hero{
            background: linear-gradient(rgba(220,53,69,.9), rgba(220,53,69,.9)),
            url('https://images.unsplash.com/photo-1615461066841-6116e61058f4');
            background-size: cover;
            background-position: center;
            color:white;
            padding:120px 0;
        }

        .section-title{
            font-weight:bold;
            margin-bottom:40px;
            color:#dc3545;
        }

        .feature-card,
        .role-card{
            transition:0.3s;
        }

        .feature-card:hover,
        .role-card:hover{
            transform:translateY(-8px);
        }

        .blood-group{
            padding:15px;
            border-radius:10px;
            color:white;
            font-weight:bold;
            text-align:center;
        }

        .cta{
            background:#dc3545;
            color:white;
            padding:80px 0;
        }

        footer{
            background:#212529;
            color:white;
            padding:20px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
