<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gamix Home</title>

  <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="../assets/css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body id="top">

<!-- header -->

  <header class="header">

    <div class="header-bottom new" data-header>
      <div class="container">

        <a href="#" class="logo">Gamix</a>

        <nav class="navbar" data-navbar>
          <ul class="navbar-list">

            <li class="navbar-item">
              <a href="index.php" class="navbar-link new" data-nav-link>Home</a>
            </li>

         

            <li class="navbar-item">
              <a href="features.html" class="navbar-link new" data-nav-link>Latest</a>
            </li>

            <li class="navbar-item">
              <a href="shop.html" class="navbar-link new" data-nav-link>Shop</a>
            </li>

            <li class="navbar-item">
              <a href="comments.html" class="navbar-link new" data-nav-link>Comments</a>
            </li>


            <li class="navbar-item">
              <a href="about.html" class="navbar-link new" data-nav-link>About Us</a>
            </li>
            <li class="navbar-item">
              <a href="../login.php" class="navbar-link new" data-nav-link>SignIn/SignUp</a>
            </li>

          </ul>
        </nav>

        <div class="header-actions">

          <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
            <ion-icon name="menu-outline" class="menu"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
          </button>

        </div>

      </div>
    </div>

  </header>
  
  <main>
    <article>

<!-- gamix -->
      <section class="section gamix" id="home" aria-label="home"
        style="background-image: url('../assets/images/gamix-bg.jpg')">
        <div class="container">

          <div class="gamix-content">

            <p class="gamix-subtitle">Gaming World</p>

            <h1 class="h1 gamix-title">
              Create <span class="span">Manage</span> Everything
            </h1>

            <p class="gamix-text">
              <b>Nowadays GAMING is very popular among all the youngsters in any country around the world. Everyone in today’s era plays games on mobile phones or PC/laptops. In <b>GAMIX</b>, you can see some of the key information about gaming.</b>
            </p>

            <form action="#genres">
            <button class="btn new">Gaming Genres</button>
            </form>

          </div>

          <figure class="gamix-banner img-holder" style="--width: 700; --height: 700;">
            <img src="../assets/images/cod-bg.png" width="1000" height="1000" alt="cod banner" class="w-100">
          </figure>

        </div>
      </section>

<!-- gaming genres -->

        <section class="section genre-game" id="genres" aria-label="genre game">
          <div class="container">

            <p class="section-subtitle">All about</p>

            <h2 class="h2 section-title">
              Gaming <span class="span">Genres</span>
            </h2>

            <ul class="has-scrollbar">

              <li class="scrollbar-item">
                <div class="genre-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="../assets/images/action.jpg" width="400" height="470" loading="lazy"
                      alt="Cyberpunk Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge new">Action</a>

                    <h3 class="h3">
                      <a href="../genres/action.html" class="card-title">It's all about <span class="span">Timing...</span></a>
                    </h3>

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="genre-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="../assets/images/racing.jpg" width="400" height="470" loading="lazy"
                      alt="Cyberpunk Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge new">Racing</a>

                    <h3 class="h3">
                      <a href="../genres/racing.html" class="card-title">Driving skills <span class="span">Really matters...</span></a>
                    </h3>

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="genre-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="../assets/images/puzzle.jpeg" width="400" height="470" loading="lazy"
                      alt="White Walker Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge new">Puzzle</a>

                    <h3 class="h3">
                      <a href="../genres/puzzle.html" class="card-title">It's all about <span class="span">Thinking...</span></a>
                    </h3>

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="genre-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="../assets/images/fps.jpg" width="400" height="470" loading="lazy"
                      alt="fps bg" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge new">FPS</a>

                    <h3 class="h3">
                      <a href="../genres/fps.html" class="card-title">Just finish <span class="span">The Task</span> and Score...</a>
                    </h3>

                  </div>

                </div>
              </li>

              

            </ul>

          </div>
        </section>




  <!--- footer -->

  <footer class="footer">

    <div class="ftop">
      <div class="container">

        <div class="fbrand">

          <a href="index.php" class="logo">Gamix</a>

    <div class="fbottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 Gamix. All Right Reserved.
        </p>

      </div>
    </div>

  </footer>

  <!-- up button -->

  <a href="#up" class="top-button" aria-label="going up" data-back-top-btn>
    <ion-icon name="caret-up"></ion-icon>
  </a>

  <!-- js links -->
  <script src="../assets/js/script.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>