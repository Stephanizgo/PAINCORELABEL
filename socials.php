<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = 'paincore13@gmail.com';
    $subject = 'New message from PAINCORE contact form';
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Socials | PAINCORE</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- GSAP CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <style>
    /* Reset animation states */
    .gsap-animate {
      opacity: 0;
    }
    .hero-image-container {
      opacity: 0;
      scale: 0.9;
    }
    .social-card {
      opacity: 0;
      transform: translateY(20px);
    }
    
    /* Body and background styles */
    body {
      margin: 0;
      padding-top: 80px;
      font-family: Arial, sans-serif;
      color: white;
      text-align: center;
      background-color: rgb(49, 49, 49);
      background-image: url('image.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      min-height: 100vh;
    }
    
    /* Header styles */
    header {
      position: fixed;
      top: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.8);
      padding: 15px 0;
      z-index: 1000;
      transform: translateY(-100%);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    /* Hero image container */
    .hero-image-container {
      max-width: 800px;
      margin: 20px auto;
      padding: 0 20px;
    }
    
    .hero-image {
      width: 100%;
      height: auto;
      max-height: 400px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    }
    
    /* Content sections */
    section {
      margin-bottom: 50px;
      padding: 30px 20px;
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 8px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }
    
    /* Content styles */
    .logo img {
      border-radius: 50%;
      margin-left: 20px;
      width: 60px;
      height: 60px;
      object-fit: cover;
    }
    
    nav a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s ease;
    }
    
    nav a:hover {
      color: #ff4081;
    }
    
    /* Social cards grid */
    .social-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }
    
    .social-card {
      background-color: rgba(30, 30, 30, 0.8);
      padding: 25px;
      border-radius: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    .social-card:hover {
      transform: translateY(-5px);
      background-color: rgba(40, 40, 40, 0.9);
    }
    
    .social-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #ff4081;
    }
    
    .social-card h3 {
      margin: 10px 0;
      font-size: 1.3rem;
    }
    
    .social-link {
      display: inline-block;
      margin-top: 15px;
      padding: 8px 20px;
      background-color: rgba(255, 64, 129, 0.2);
      color: white;
      text-decoration: none;
      border-radius: 4px;
      transition: all 0.3s ease;
    }
    
    .social-link:hover {
      background-color: rgba(255, 64, 129, 0.4);
      transform: scale(1.05);
    }
    
    /* Contact form styles */
    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      max-width: 500px;
      margin: 0 auto;
    }
    
    .form-input {
      padding: 12px;
      border-radius: 4px;
      border: none;
      background-color: rgba(255, 255, 255, 0.1);
      color: white;
    }
    
    .form-input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }
    
    .submit-btn {
      background-color: #ff4081;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
      background-color: #ff1a66;
      transform: translateY(-2px);
    }
    
    /* Footer styles */
    footer {
      background: rgba(0, 0, 0, 0.8);
      padding: 30px 0;
      text-align: center;
      opacity: 0;
      transform: translateY(50px);
    }
    
    .contact-info a {
      color: white;
      margin: 0 10px;
      text-decoration: none;
      transition: all 0.3s ease;
      padding: 5px 10px;
      border-radius: 4px;
    }
    
    .contact-info a:hover {
      color: #ff4081;
      background-color: rgba(255, 255, 255, 0.1);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      header {
        flex-direction: column;
        padding: 10px;
      }
      
      nav {
        margin-top: 10px;
        flex-wrap: wrap;
        justify-content: center;
      }
      
      .hero-image-container {
        padding: 0 10px;
      }
      
      section {
        margin: 20px 10px;
      }
      
      .social-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">
      <img src="IMG-20250521-WA0029.jpg" alt="logo">
    </div>
    <nav>
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="releases.html">Releases</a>
      <a href="socials.php" class="active">Socials</a>
    </nav>
  </header>
  
  <main>
    <div class="hero-image-container">
      <img src="IMG-20250521-WA0029.jpg" alt="PAINCORE" class="hero-image">
    </div>
    
    <section class="intro-section">
      <h1 class="gsap-animate">Connect With Us</h1>
      <h2 class="gsap-animate">Follow PAINCORE across all platforms</h2>
    </section>
    
    <section class="socials-section">
      <div class="social-grid">
        <div class="social-card gsap-animate">
          <div class="social-icon">
            <i class="fab fa-instagram"></i>
          </div>
          <h3>Instagram</h3>
          <p>Daily updates and behind-the-scenes</p>
          <a href="https://instagram.com" class="social-link" target="_blank">Follow</a>
        </div>
        
        <div class="social-card gsap-animate">
          <div class="social-icon">
            <i class="fab fa-youtube"></i>
          </div>
          <h3>YouTube</h3>
          <p>Music videos and live performances</p>
          <a href="https://youtube.com" class="social-link" target="_blank">Subscribe</a>
        </div>
        
        <div class="social-card gsap-animate">
          <div class="social-icon">
            <i class="fab fa-spotify"></i>
          </div>
          <h3>Spotify</h3>
          <p>Stream our latest releases</p>
          <a href="https://spotify.com" class="social-link" target="_blank">Listen</a>
        </div>
        
        <div class="social-card gsap-animate">
          <div class="social-icon">
            <i class="fab fa-twitter"></i>
          </div>
          <h3>Twitter</h3>
          <p>News and announcements</p>
          <a href="https://twitter.com" class="social-link" target="_blank">Follow</a>
        </div>
        
        <div class="social-card gsap-animate">
          <div class="social-icon">
            <i class="fab fa-soundcloud"></i>
          </div>
          <h3>SoundCloud</h3>
          <p>Exclusive tracks and remixes</p>
          <a href="https://soundcloud.com" class="social-link" target="_blank">Follow</a>
        </div>
        
        <div class="social-card gsap-animate">
          <div class="social-icon">
            <i class="fab fa-tiktok"></i>
          </div>
          <h3>TikTok</h3>
          <p>Short clips and challenges</p>
          <a href="https://tiktok.com" class="social-link" target="_blank">Follow</a>
        </div>
      </div>
    </section>
    
    <section class="contact-section">
      <h2 class="gsap-animate">Direct Contact</h2>
      <form class="contact-form gsap-animate">
        <input type="text" class="form-input" placeholder="Your Name" required>
        <input type="email" class="form-input" placeholder="Your Email" required>
        <textarea class="form-input" rows="4" placeholder="Your Message" required></textarea>
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </section>
  </main>

  <footer>
    <div class="contact-info">
      <a href="mailto:paincore13@gmail.com">paincore13@gmail.com</a> | 
      <a href="tel:+420775908268">+420 775 908 268</a>
    </div>
    <div class="copyright">
      &copy; <span id="year"></span> paincore13 All rights reserved.
    </div>
  </footer>

  <script>
    // Automatically updates the year
    document.getElementById("year").textContent = new Date().getFullYear();

    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // GSAP Animations
    document.addEventListener('DOMContentLoaded', () => {
      // Set initial states
      gsap.set('.gsap-animate', { opacity: 0, y: 20 });
      gsap.set('.hero-image-container', { opacity: 0, scale: 0.9 });
      
      // Header slide-down animation
      gsap.to('header', {
        y: 0,
        duration: 1,
        ease: "elastic.out(1, 0.5)"
      });

      // Hero image animation
      gsap.to('.hero-image-container', {
        opacity: 1,
        scale: 1,
        duration: 1.5,
        ease: "elastic.out(1, 0.5)"
      });

      // Intro section animations
      gsap.to('.intro-section h1', {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "back.out(1.7)",
        scrollTrigger: {
          trigger: '.intro-section',
          start: "top 80%",
          toggleActions: "play none none reset"
        }
      });

      gsap.to('.intro-section h2', {
        opacity: 1,
        y: 0,
        duration: 0.8,
        delay: 0.3,
        ease: "back.out(1.7)",
        scrollTrigger: {
          trigger: '.intro-section',
          start: "top 80%",
          toggleActions: "play none none reset"
        }
      });

      // Social cards animation
      gsap.to('.social-card', {
        opacity: 1,
        y: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: "back.out(1.7)",
        scrollTrigger: {
          trigger: '.socials-section',
          start: "top 80%",
          toggleActions: "play none none reset"
        }
      });

      // Contact section animation
      gsap.to('.contact-section h2', {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "back.out(1.7)",
        scrollTrigger: {
          trigger: '.contact-section',
          start: "top 80%",
          toggleActions: "play none none reset"
        }
      });

      gsap.to('.contact-form', {
        opacity: 1,
        y: 0,
        duration: 0.8,
        delay: 0.3,
        ease: "power2.out",
        scrollTrigger: {
          trigger: '.contact-section',
          start: "top 80%",
          toggleActions: "play none none reset"
        }
      });

      // Footer animation
      gsap.to('footer', {
        opacity: 1,
        y: 0,
        duration: 1,
        ease: "power2.out",
        scrollTrigger: {
          trigger: 'footer',
          start: "top 90%",
          once: true
        }
      });
    });
  </script>
</body>
</html>