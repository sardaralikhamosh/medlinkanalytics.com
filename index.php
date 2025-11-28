<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics - Coming Soon</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1a3a5f 0%, #2c5c8a 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            margin-bottom: 30px;
        }
        
        .logo h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .tagline {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 40px;
            color: #a8d8ff;
            letter-spacing: 0.5px;
        }
        
        .main-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .main-content p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 40px;
            color: #e6f2ff;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        
        .countdown-item {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px 15px;
            border-radius: 10px;
            min-width: 100px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .countdown-number {
            font-size: 2.5rem;
            font-weight: 700;
            display: block;
        }
        
        .countdown-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
            color: #c2e0ff;
        }
        
        .notify-form {
            margin-bottom: 30px;
        }
        
        .form-group {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }
        
        input[type="email"] {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }
        
        button {
            padding: 15px 30px;
            border: none;
            border-radius: 0 50px 50px 0;
            background: #4facfe;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        button:hover {
            background: #00c6ff;
        }
        
        .contact-info {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .contact-info p {
            margin-bottom: 10px;
            color: #c2e0ff;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            color: #4facfe;
            transform: translateY(-3px);
        }
        
        .copyright, .copyright b{
            margin-top: 40px;
            font-size: 0.9rem;
            color: #fff;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            .logo h1 {
                font-size: 2.5rem;
            }
            
            .tagline {
                font-size: 1.2rem;
            }
            
            .main-content h2 {
                font-size: 2rem;
            }
            
            .main-content p {
                font-size: 1rem;
            }
            
            .form-group {
                flex-direction: column;
            }
            
            input[type="email"] {
                border-radius: 50px;
                margin-bottom: 10px;
            }
            
            button {
                border-radius: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>MedLink Analytics</h1>
            <div class="tagline">Smarter Analytics. Stronger Revenue.</div>
        </div>
        
        <div class="main-content">
            <h2>Our New Website Is Coming Soon</h2>            
            <div class="countdown">
                <div class="countdown-item">
                    <span class="countdown-number" id="days">00</span>
                    <span class="countdown-label">Days</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="hours">00</span>
                    <span class="countdown-label">Hours</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="minutes">00</span>
                    <span class="countdown-label">Minutes</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="seconds">00</span>
                    <span class="countdown-label">Seconds</span>
                </div>
            </div>
            
            <div class="contact-info">
                <p>For immediate inquiries, please contact us at:</p>
                <p>contact@medlinkanalytics.com</p>
            </div>
        </div>
    </div>
    
    <div class="copyright">
        &copy; 2025 MedLink Analytics. Web Development by <a href="https://sardaralikhamosh.github.io"><b>Sardar Ali Khamosh</b></a>.
    </div>

    <script>
        // Set the date we're counting down to (30 days from now)
        const countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 30);
        
        // Update the countdown every 1 second
        const countdownFunction = setInterval(function() {
            // Get today's date and time
            const now = new Date().getTime();
            
            // Find the distance between now and the count down date
            const distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Display the result
            document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
            document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');
            
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(countdownFunction);
                document.getElementById("days").innerHTML = "00";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
            }
        }, 1000);
        
        // Form submission handler
        document.getElementById('notification-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            alert(`Thank you! We'll notify you at ${email} when we launch.`);
            this.querySelector('input[type="email"]').value = '';
        });
    </script>
</body>
</html>