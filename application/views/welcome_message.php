<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background-color: #f8f8f8;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #d9d9d9;
        }

        header img {
            height: 60px;
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        nav {
            display: flex;
            gap: 10px;
        }

        nav a {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #e8baba;
            color: #fff;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #d69e9e;
        }

        .hero {
            text-align: center;
            padding: 20px;
            background-color: #fdf1f1;
        }

        .hero h2 {
            font-size: 2rem;
            color: #b35454;
        }

        .hero img {
            max-width: 80%;
            height: auto;
            margin-top: 10px;
        }

        .section {
            padding: 20px;
        }

        .section h3 {
            font-size: 1.8rem;
            color: #b35454;
            text-align: center;
            margin-bottom: 20px;
        }

        .cards {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 15px;
            max-width: 300px;
            background-color: #fff;
        }

        .card p {
            margin: 0;
        }

        .carousel {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .carousel img {
            width: 150px;
            height: 100px;
            object-fit: cover;
        }

        .button {
            text-align: center;
            margin-top: 20px;
        }

        .button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #e8baba;
            color: #fff;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        footer a {
            color: #e8baba;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo-placeholder.png" alt="BPSDMD Logo">
        <h1>Knowledge Management System</h1>
        <nav>
            <a href="#">KMS</a>
            <a href="#">e-Journal</a>
            <a href="#">e-Warta</a>
            <a href="#">COE</a>
        </nav>
    </header>

    <section class="hero">
        <h2>Knowledge Management System</h2>
        <img src="building-placeholder.png" alt="Building Image">
    </section>

    <section class="section">
        <h3>What is Knowledge Management System?</h3>
        <div class="cards">
            <div class="card">
                <p>Knowledge Management System (KMS) is a system for managing, storing, and sharing knowledge within an organization.</p>
            </div>
            <div class="card">
                <p>KMS BPSDMD supports structured knowledge management, collaboration, and innovative public services.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h3>e-Warta</h3>
        <div class="carousel">
            <img src="image1-placeholder.png" alt="Image 1">
            <img src="image2-placeholder.png" alt="Image 2">
            <img src="image3-placeholder.png" alt="Image 3">
        </div>
        <div class="button">
            <a href="#">See All</a>
        </div>
    </section>

    <section class="section">
        <h3>e-Journal</h3>
        <div class="cards">
            <div class="card">
                <p>Model for Community Empowerment to Improve Environmental Quality in Semarang.</p>
            </div>
            <div class="card">
                <p>Model Collaborative Governance for Planning and Budgeting in Public Procurement.</p>
            </div>
            <div class="card">
                <p>Program to Increase Tax Revenue in Pekalongan City.</p>
            </div>
        </div>
        <div class="button">
            <a href="#">See All</a>
        </div>
    </section>

    <section class="section">
        <h3>Center of Excellence</h3>
        <p>The Center of Excellence (CoE) BPSDMD Jawa Tengah is a learning resource hub designed to support the development of competencies for civil servants.</p>
        <div class="button">
            <a href="#">See All</a>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <h4>Location</h4>
                <p>Sasana Widya Praja - BPSDMD Jawa Tengah</p>
                <p>Address: Setiabudi 201 A Semarang, 50263</p>
            </div>
            <div>
                <h4>About Us</h4>
                <p>Phone: (024) 7473066</p>
                <p>Email: admin@bpsdmdjateng.go.id</p>
            </div>
        </div>
        <p>Made with ♥ by Internship Informatics'21 Diponegoro University</p>
    </footer>
</body>
</html>
