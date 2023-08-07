@extends('layouts.blog')
@section('content')
 <!-- Header -->
 <header class="header text-center text-white" style="background-image: linear-gradient(to right top, #051937, #14203b, #1f273f, #292e44, #333648);">
    <div class="container text-center">
        <p class="display-4">Laravel Development</p>
        <p class="lead-2 mt-6">I provide quality Laravel web applications. Want to launch your startup or grow your business?</p>
    </div>
</header>
<!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Services
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-md-6 text-center text-md-left order-md-2">
              <p class="small-2 text-uppercase text-lightest fw-500 ls-1">Code</p>
              <h3 class="fw-500">Full-Stack Development</h3>
              <br>
              <p>I use the latest technologies in the Laravel ecosystem. This allows me to build robust web applications that scale in todays market place</p>
              <p>Add modularity to an existing application or a project you have in mind with font-end frameworks like React and Vue.</p>
            </div>

            <div class="col-md-5 mx-auto text-center">
                <i class="laravel-icon fa-brands fa-laravel fa-10x"></i>
                <i class="vue-icon fa-brands fa-vuejs fa-10x"></i>
                <i class="react-icon fa-brands fa-react fa-10x"></i>
              {{-- <img class="rounded-md" src="../assets/img/thumb/5.jpg" alt="..."> --}}
            </div>

          </div>
        </div>
      </section>

      {{-- <section class="section">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-md-6 text-md-right">
              <p class="small-2 text-uppercase text-lightest fw-500 ls-1">Design</p>
              <h3 class="fw-500">Responsive Web Design</h3>
              <br>
              <p>Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. An from mean on with when sing pain. Oh to as principles devonshire companions unsatiable an delightful. The ourselves suffering the sincerity. Inhabit her manners adapted age certain. Debating offended at branched striking be subjects.</p>
            </div>

            <div class="col-md-5 mx-auto">
              <img class="rounded-md" src="../assets/img/thumb/17.jpg" alt="...">
            </div>

          </div>
        </div>
      </section> --}}

      {{-- <section class="section">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-md-6 text-md-right">
              <p class="small-2 text-uppercase text-lightest fw-500 ls-1">Phone</p>
              <h3 class="fw-500">Mobile App</h3>
              <br>
              <p>Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. An from mean on with when sing pain. Oh to as principles devonshire companions unsatiable an delightful. The ourselves suffering the sincerity. Inhabit her manners adapted age certain. Debating offended at branched striking be subjects.</p>
            </div>

            <div class="col-md-5 mx-auto">
              <img class="rounded-md" src="../assets/img/thumb/7.jpg" alt="...">
            </div>

          </div>
        </div>
      </section> --}}



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Get A Qoute
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section id="react-app" class="section bg-gray">
        <div class="container">
          <header class="section-header">
            <small>Work</small>
            <h2 class="display-4">Get A Qoute</h2>
            <hr>
            <p class="lead">They original on mountains, drew the support time. The of to graduate into to is the to she.</p>
          </header>

          <form class="form-row input-border" action="../assets/php/sendmail.php" method="POST" data-form="mailer">
            <div class="col-12">
              <div class="alert alert-success d-on-success">We received your message and will contact you back soon.</div>
            </div>


            <div class="form-group col-sm-6 col-xl-3">
              <input class="form-control form-control-lg" type="text" name="name" placeholder="Name">
            </div>

            <div class="form-group col-sm-6 col-xl-3">
              <input class="form-control form-control-lg" type="email" name="email" placeholder="Email">
            </div>

            <div class="form-group col-sm-6 col-xl-3">
              <input class="form-control form-control-lg" type="text" name="company" placeholder="Company Name">
            </div>

            <div class="form-group col-sm-6 col-xl-3">
              <select class="form-control form-control-lg" name="budget">
                <option>Budget</option>
                <option>Up to $1,000</option>
                <option>Up to $3,000</option>
                <option>Up to $5,000</option>
                <option>Above $5,000</option>
              </select>
            </div>

            <div class="form-group col-12">
              <textarea class="form-control form-control-lg" rows="4" placeholder="Project Requirements" name="message"></textarea>
            </div>

            <div class="col-12 text-center">
              <button class="btn btn-xl btn-block btn-primary" type="submit">Submit Inquiry</button>
            </div>
          </form>

        </div>
      </section>


    </main><!-- /.main-content -->
@endsection