<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patricia Varela Journey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{asset('img/apps-32.png')}}">
    <link rel="stylesheet" href="{{asset('css/base/main.css')}}">
</head>
<body>
    <main>
      <nav class="main-menu">
        <h1>Portfolio</h1>
        {{-- <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" /> --}}
        <img class="logo" src="{{asset('img/apps.png')}}" alt="" />
        <ul>
          <li class="nav-item active">
            <b></b>
            <b></b>
            <a href="#">
              <i class="fa fa-house nav-icon"></i>
              <span class="nav-text">Blog</span>
            </a>
          </li>

          <li class="nav-item">
            <b></b>
            <b></b>
            <a href="#">
              <i class="fa fa-user nav-icon"></i>
              <span class="nav-text">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <b></b>
            <b></b>
            <a href="#">
              <i class="fa fa-calendar-check nav-icon"></i>
              <span class="nav-text">Studies</span>
            </a>
          </li>

          <li class="nav-item">
            <b></b>
            <b></b>
            <a href="#">
              <i class="fa fa-person-running nav-icon"></i>
              <span class="nav-text">Projects</span>
            </a>
          </li>

          <li class="nav-item">
            <b></b>
            <b></b>
            <a href="#">
              <i class="fa fa-sliders nav-icon"></i>
              <span class="nav-text">Other Info</span>
            </a>
          </li>
        </ul>
      </nav>

      <section class="content">
        <div class="left-content">
          <div class="activities">
            <h1>PHP Laravel Experience</h1>
            <div class="activity-container">
              <div class="image-container img-one">
                <img src="{{asset('img/m-01.png')}}" alt="Authentication" />
                <div class="overlay">
                  <h3>Authenticate</h3>
                </div>
              </div>

              <div class="image-container img-two">
                <img src="{{asset('img/m-02.png')}}" alt="Authorization" />
                <div class="overlay">
                  <h3>Authorize</h3>
                </div>
              </div>

              <div class="image-container img-three">
                <a href="{{ route('home.index')}}">
                <img src="{{asset('img/m-03.jpg')}}" alt="Laravel  PHP">
                <div class="overlay">
                  <h3>Laravel PHP</h3>
                </div>
                </a>
              </div>

              <div class="image-container img-four">
                <img src="{{asset('img/m-04.png')}}" alt="Security" />
                <div class="overlay">
                  <h3>Security</h3>
                </div>
              </div>

              <div class="image-container img-five">
                <img src="{{asset('img/m-05.png')}}" alt="API" />
                <div class="overlay">
                  <h3>API</h3>
                </div>
              </div>

              <div class="image-container img-six">
                <img src="{{asset('img/m-06.png')}}" alt="Frontend" />
                <div class="overlay">
                  <h3>Blade Frontend</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="left-bottom">
            <div class="weekly-schedule">
              <h1>Skills</h1>
              <div class="calendar">
                <div class="day-and-activity activity-one">
                  <div class="day">
                    <h1>PHP</h1>
                    <p>3 Years</p>
                  </div>
                  <div class="activity">
                    <h2>PHP - Laravel - Wordpress</h2>
                    <div class="participants">
                      <img src="{{asset('img/l-php.png')}}" style="--i: 1" alt="" />
                      <img src="{{asset('img/l-laravel.png')}}" style="--i: 2" alt="" />
                      <img src="{{asset('img/l-wordpress.png')}}" style="--i: 3" alt="" />
                    </div>
                  </div>
                  <button class="btn">Projects</button>
                </div>

                <div class="day-and-activity activity-two">
                  <div class="day">
                    <h1>JS</h1>
                    <p>3 years</p>
                  </div>
                  <div class="activity">
                    <h2>JavaScript CSS HTML NodeJS</h2>
                    <div class="participants">
                        <img src="{{asset('img/l-html.png')}}" style="--i: 1" alt="" />
                        <img src="{{asset('img/l-css.png')}}" style="--i: 2" alt="" />
                        <img src="{{asset('img/l-js.png')}}" style="--i: 3" alt="" />
                    </div>
                  </div>
                  <button class="btn">Projects</button>
                </div>

                <div class="day-and-activity activity-three">
                  <div class="day">
                    <h1>.NET</h1>
                    <p>+5 Years</p>
                  </div>
                  <div class="activity">
                    <h2>C# - Visual Basic - ASP</h2>
                    <div class="participants">
                        <img src="{{asset('img/l-net.png')}}" style="--i: 1" alt="" />
                        <img src="{{asset('img/l-vstudio.png')}}" style="--i: 2" alt="" />
                        <img src="{{asset('img/l-asp.png')}}" style="--i: 3" alt="" />
                        <img src="{{asset('img/l-csharp.png')}}" style="--i: 4" alt="" />
                    </div>
                  </div>
                  <button class="btn">Projects</button>
                </div>

                <div class="day-and-activity activity-four">
                  <div class="day">
                    <h1>DB</h1>
                    <p>+5 Years</p>
                  </div>
                  <div class="activity">
                    <h2>SQLServer - MySql ☆ Store Procedures</h2>
                    <div class="participants">
                      {{-- <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" style="--i: 1" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9" style="--i: 2" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 4" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de" style="--i: 5" alt="" /> --}}
                      <img src="{{asset('img/l-sql.png')}}" style="--i: 1" alt="" />
                      <img src="{{asset('img/l-sql-server.png')}}" style="--i: 2" alt="" />
                      <img src="{{asset('img/l-mysql.png')}}" style="--i: 3" alt="" />
                    </div>
                  </div>
                  <button class="btn">Projects</button>
                </div>
              </div>
            </div>

            <div class="personal-bests">
              <h1>Personal Bests</h1>
              <div class="personal-bests-container">
                <div class="best-item box-one">
                  <p>Visual Basic: Trainer with Moodle ☆ VB-PHP</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/242bbd8c-aaf8-4aee-a3e4-e0df62d1ab27" alt="" />
                </div>
                <div class="best-item box-two">
                  <p>Insurance Web Quotes ☆ .NET-C#</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/a3b3cb3a-5127-498b-91cc-a1d39499164a" alt="" />
                </div>
                <div class="best-item box-three">
                  <p>Tech wholesaler online stores integration ☆ PHP</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e0ee8ffb-faa8-462a-b44d-0a18c1d9604c" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="right-content">
          <div class="user-info">
            <div class="icon-container">
              <i class="fas fa-envelope navitem-icon"></i>
              {{-- <i class="fa fa-message nav-icon"></i> --}}
            </div>
            <h4>Patricia Varela</h4>
            <img src="{{asset('img/paty-circle.png')}}" alt="user" />
          </div>

          <div class="active-calories">
            <h1 style="align-self: flex-start">Developer Level</h1>
            <div class="active-calories-container">
              <div class="box" style="--i: 85%">
                <div class="circle">
                  <h2>85<small>%</small></h2>
                </div>
              </div>
              <div class="calories-content">
                <p><span>PHP:</span> Recent 90%</p>
                <p><span>JavaScript:</span> Recent 75%</p>
                <p><span>.NET:</span>&nbsp;Most of Time 80%</p>
              </div>
            </div>
          </div>

          <div class="mobile-personal-bests">
            <h1>Personal Bests</h1>
            <div class="personal-bests-container">
              <div class="best-item box-one">
                <p>Fastest 5K Run: 22min</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/05dfc444-9ed3-44cc-96af-a9cf195f5820" alt="" />
              </div>
              <div class="best-item box-two">
                <p>Longest Distance Cycling: 4 miles</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9ca170e9-1252-4fa6-8677-36493540c1f2" alt="" />
              </div>
              <div class="best-item box-three">
                <p>Longest Roller-Skating: 2 hours</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/262d1611-ed4c-4297-981c-480cf7f95714" alt="" />
              </div>
            </div>
          </div>

          <div class="friends-activity">
            <h1>Roles</h1>
            <div class="card-container">
              <div class="card">
                <div class="card-user-info">
                  <img src="{{asset('img/icon-trainer.png')}}" alt="" />
                  <h2>Trainer and Developer</h2>
                </div>
                <img class="card-img" src="{{asset('img/other-1.png')}}" alt="Development and Training" />
                <p>Insurance Quotes 📍Software Company</p>
              </div>

              <div class="card card-two">
                <div class="card-user-info">
                    <img src="{{asset('img/icon-leader.png')}}" alt="" />
                  <h2>Agile Project Leader and Developer</h2>
                </div>
                <img class="card-img" src="{{asset('img/other-2.png')}}" alt="Leadership and Development" />
                <p>Stock integration 💼 Tech Wholesaler </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <script type="text/javascript">
    const navItems = document.querySelectorAll(".nav-item");

    navItems.forEach((navItem, i) => {
    navItem.addEventListener("click", () => {
        navItems.forEach((item, j) => {
        item.className = "nav-item";
        });
        navItem.className = "nav-item active";
    });
    });
    </script>
  </body>
</html>

