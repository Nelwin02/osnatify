<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexfile/css/styles.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>MyPortfolio</title>
    <style>
        
    </style>
</head>
<body>
    
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
            <a href="#" class="nav__logo"><img src="./assets/opd.png" alt="opd" style="width: 100px;"> </a>
        
    </a>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
                    <li class="nav__item"><a href="#login" class="nav__link">Login</a></li>

                    <li class="nav__item">
                   
 
                    </li>
                   
                    
                </ul>
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title">Hi,<br>Welcome to<span class="home__title-color">  &nbsp;  Osnatify</h1>
                <br>
                <p>provide critical healthcare services but also contribute to public health, <br>  medical innovation, education, and economic development in their communities.</p>

               

  
            </div>

            <div class="home__social">
                <a href="https://www.facebook.com/ospitalngnasugbu.070317/" class="home__social-icon"><i class='bx bxl-facebook'></i></a>
                
                

    
    </div>
            </div>

            <div class="home__img">
                <svg class="home__blob" viewBox="0 0 479 467" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <mask id="mask0" mask-type="alpha">
                        <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                    </mask>
                    <g mask="url(#mask0)">
                        <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                        <image class="home__blob-img" x="50" y="60" href="./assets/bosna3.png"/>
                    </g>
                </svg>
            </div>
          
            
        </section><hr>

        <!-- ABOUT -->
        <section class="about section " id="about">
            <h2 class="section-title">About</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="./assets/nurse3.jpg" alt="">
                </div>
                
                <div>
                    <h2 class="about__subtitle">Welcome to Hospital ng Nasugbu</h2>
                    <p class="about__text">Our Mission <br><br>
                    Describe the hospital's primary mission and commitment to patient care and community service. <br><br>
                    Our Vision <br><br>
                    Outline the hospital's vision for the future and its goals in healthcare delivery.     
                </div>                                   
            </div>
        </section><hr>



        <section class="work section" id="services">
    <h2 class="section-title">Services for OPD Management</h2>

    <div class="grid">
        <div class="grid-item">
            <img src="assets/img/patient.png">
            <span>Patient Management</span>
            <p>Manage patient records, appointments, and health information efficiently.</p>
        </div>
        <div class="grid-item">
            <img src="assets/img/admin.png">
            <span>Admin Dashboard</span>
            <p>Monitor and manage overall operations and resources in the OPD system.</p>
        </div>
        <div class="grid-item">
            <img src="assets/img/doctor.png">
            <span>Doctor's Interface</span>
            <p>Tools for doctors to access patient records, prescribe treatments, and manage schedules.</p>
        </div>
        <div class="grid-item">
            <img src="assets/img/pharmacy.png">
            <span>Pharmacy Integration</span>
            <p>Manage medication inventory, prescriptions, and dispensation.</p>
        </div>
        <div class="grid-item">
            <img src="assets/img/report.png">
            <span>Reporting and Analytics</span>
            <p>Generate reports, analyze data trends, and optimize OPD workflows.</p>
        </div>
    </div>
</section><hr>


        <!-- CONTACT -->
        <section class="contact" id="contact">
            
                        <div class="contact-content">
                            <div class="column right">
                                <div class="section-title">Contact Me</div>
                                <form action="#">
                                    <div class="fields">
                                        <div class="field name">
                                            <input type="text" placeholder="Fullname" required>
                                        </div>
                                        <div class="field email">
                                            <input type="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <input type="text" placeholder="Subject" required>
                                    </div>
                                    <div class="field textarea">
                                        <textarea cols="30" rows="10" placeholder="Message.." required></textarea>
                                    </div>
                                    <div class="button-area">
                                        <button type="submit">Send message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="login" id="login">
            <div class="container">
                <h2 class="login__title">Login</h2>
                <div class="login__container">
                    <div class="login__card" onclick="location.href='login.php';">
                        <h3>Admin Login</h3>
                        <p>Login as an administrator to manage system settings.</p>
                        <button class="btn-login">Login</button>
                    </div>
                    <div class="login__card" onclick="location.href='login.php';">
                        <h3>Clerk Login</h3>
                        <p>Login as a clerk to manage patient information.</p>
                        <button class="btn-login">Login</button>
                    </div>
                    <div class="login__card" onclick="location.href='login.php';">
                        <h3>Doctor Login</h3>
                        <p>Login as a doctor to access patient records and schedules.</p>
                        <button class="btn-login">Login</button>
                    </div>
                </div>
            </div>
        </section>
    
    </main>

    <footer class="footer">
        <p class="footer__title">OSPITAL NG NASUGBU</p>
        <div class="footer__social">
        <a href="https://www.facebook.com/ospitalngnasugbu.070317/"  class="footer__icon"><i class='bx bxl-facebook'></i></a>
           
        </div>
        <p class="footer__copy">&#169; osna. All rights reserved</p>
    </footer>

   
    <script src="assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('mode-toggle').addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');
            });
        });

        document.getElementById('loginLink').addEventListener('click', function(event) {
            event.preventDefault();
            fetch('login.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('modal-body').innerHTML = data;
                    document.getElementById('loginModal').style.display = 'block';

                    // Attach close event to the close button inside the modal
                    document.querySelector('.modal .close').addEventListener('click', function() {
                        document.getElementById('loginModal').style.display = 'none';
                    });
                });
        });

        // Close the modal when the user clicks outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('loginModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
    <script>
        document.getElementById('mode-toggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('mode-toggle').addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');
            });
        });
    </script>
    <script>
        const modeToggle = document.getElementById('mode-toggle');
        const modeIcon = document.getElementById('mode-icon');
    
        modeToggle.addEventListener('click', () => {
          // Toggle between light and dark mode
          if (modeIcon.classList.contains('fa-sun')) {
            modeIcon.classList.remove('fa-sun');
            modeIcon.classList.add('fa-moon'); // Switch to moon icon
            // Add your code to switch to dark mode
          } else {
            modeIcon.classList.remove('fa-moon');
            modeIcon.classList.add('fa-sun'); // Switch to sun icon
            // Add your code to switch to light mode
          }
        });
      </script>
      <script>
        document.getElementById("cvButton").addEventListener("click", function() {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("modalFrame").src = "assets/file/NELWIN_ROSALES_RESUME.pdf";
          });
          
          document.getElementById("certButton").addEventListener("click", function() {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("modalFrame").src = "assets/file/IT_Cert.pdf";
          });
          
          document.getElementsByClassName("close")[0].addEventListener("click", function() {
            document.getElementById("myModal").style.display = "none";
          });
          
      </script>
      <script>
        document.getElementById('btn-message').addEventListener('click', function() {
    var chatBox = document.getElementById('chat-box');
    if (chatBox.style.display === 'none' || chatBox.style.display === '') {
        chatBox.style.display = 'block';
    } else {
        chatBox.style.display = 'none';
    }
});

      </script>
      <script>

</script>

     
    
</body>
</html>
