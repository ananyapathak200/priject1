<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Stress Management & Mental Health System</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

/* 🌈 COLOR PALETTE UPDATED */
:root{
    --bg: #f2f7ff;
    --white: #ffffff;

    /* NEW PASTEL COLORS */
    --pastel-blue: #dceaff;
    --pastel-purple: #ebd9ff;
    --pastel-green: #dfffea;

    /* GRADIENTS */
    --gradient-hero: linear-gradient(135deg, #dceaff, #ebd9ff);
    --gradient-card: linear-gradient(135deg, #ffffff, #f4f8ff);

    --primary: #6a80ff;
    --primary-soft: #e3e8ff;

    --text-dark: #1e293b;
    --text-light: #64748b;

    --radius: 16px;
    --shadow: 0 8px 24px rgba(70, 90, 150, 0.15);
    --glow: 0 0 15px rgba(110, 140, 255, 0.3);
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body{
    background: var(--bg);
    color: var(--text-dark);
}

/* ------------------------------------------------- */
/* HEADER */
/* ------------------------------------------------- */

header{
    width: 100%;
    padding: 18px 6%;
    display: flex;
    align-items: center;
    justify-content: space-between;

    background: linear-gradient(90deg, #e7f1ff, #f0e6ff);
    box-shadow: var(--shadow);
}

.logo{
    font-size: 24px;
    font-weight: 700;
    color: var(--primary);
    text-shadow: var(--glow);
}

nav a{
    margin-left: 22px;
    font-weight: 500;
    color: var(--text-dark);
    text-decoration: none;
    transition: 0.3s;
}

nav a:hover{
    color: var(--primary);
}

/* BUTTONS */
.btn{
    padding: 10px 20px;
    border-radius: 12px;
    cursor: pointer;
    border: none;
    font-weight: 600;
    transition: 0.3s;
}

.btn-primary{
    background: var(--primary);
    color: white;
    box-shadow: var(--glow);
}

.btn-primary:hover{
    transform: translateY(-3px);
    box-shadow: 0 0 18px rgba(120, 140, 255, 0.5);
}

.btn-outline{
    background: var(--white);
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-outline:hover{
    background: var(--primary);
    color: white;
}

/* ------------------------------------------------- */
/* HERO SECTION */
/* ------------------------------------------------- */

.hero{
    padding: 70px 6%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 50px;

    background: var(--gradient-hero);
}

.hero-text{
    max-width: 550px;
}

.hero-text h1{
    font-size: 40px;
    line-height: 52px;
    background: linear-gradient(90deg, #6a80ff, #9a68ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-text p{
    margin: 18px 0 25px;
    color: var(--text-light);
    font-size: 16px;
}

.hero-img{
    width: 430px;
    height: 310px;
    background: linear-gradient(135deg, #dfffea, #dceaff);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-img h2{
    font-size: 24px;
    color: #5c6c88;
}

/* ------------------------------------------------- */
/* FEATURES */
/* ------------------------------------------------- */

.features{
    padding: 50px 6%;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 25px;
}

.feature-card{
    background: var(--gradient-card);
    padding: 28px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: 0.4s;
    border: 1px solid #e7eaff;
}

.feature-card:hover{
    transform: translateY(-7px) scale(1.02);
    box-shadow: 0 12px 28px rgba(90, 110, 200, 0.2);
}

.feature-card h3{
    margin-bottom: 12px;
    color: var(--primary);
    font-size: 20px;
}

/* ------------------------------------------------- */
/* FOOTER */
/* ------------------------------------------------- */

footer{
    margin-top: 45px;
    padding: 30px;
    text-align: center;
    background: linear-gradient(90deg, #dceaff, #dfffea);
    color: var(--text-dark);
}

/* ------------------------------------------------- */
/* RESPONSIVE */
/* ------------------------------------------------- */
@media(max-width: 900px){
    .hero{
        flex-direction: column;
        text-align: center;
    }
    .hero-img{
        width: 100%;
        height: 250px;
    }
    .features{
        grid-template-columns: 1fr;
    }
}

</style>
</head>

<body>

<!-- HEADER -->
<header>
    <div class="logo">Stress Management</div>

    <nav>
        <a href="#">Home</a>
        <a href="#">Exercises</a>
        <a href="#">Community</a>
        <a href="#">Support</a>
        <button class="btn btn-outline" onclick="logout()">Logout</button>
    </nav>
</header>

<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Welcome to Your Stress-Free Journey</h1>
        <p>Your mental well-being matters. Explore calming exercises, guided sessions,
        journaling tools and find your inner peace today.</p>
        <button class="btn btn-primary">Start Your Journey</button>
    </div>

    <div class="hero-img">
        <h2>✨ Relax • Breathe • Heal ✨</h2>
    </div>
</section>

<!-- FEATURES -->
<section class="features">

    <div class="feature-card">
        <h3>🧘 Guided Sessions</h3>
        <p>Meditation, breath-work, and daily calm routines.</p>
    </div>

    <div class="feature-card">
        <h3>📘 Journaling</h3>
        <p>Write your thoughts and reflect on your mental growth.</p>
    </div>

    <div class="feature-card">
        <h3>🤝 Community Support</h3>
        <p>Share your feelings and talk with supportive people.</p>
    </div>

</section>

<!-- FOOTER -->
<footer>
    © 2025 Stress Management & Mental Health System • All Rights Reserved
</footer>

<script>
function logout(){
    alert("You have been logged out.");
    window.location.href = "login.html"; 
}
</script>

</body>
</html>
