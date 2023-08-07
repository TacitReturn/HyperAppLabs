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
      <section id="react-app" class="col-md-8 col-lg-8 mx-auto">
        <div class="container">
          <header class="section-header">
            <small>Work</small>
            <h2 class="display-4">Get A Qoute</h2>
            <hr>
            <p class="lead">They original on mountains, drew the support time. The of to graduate into to is the to she.</p>
          </header>
          <div class="col-md-8">
            <StrictMode>
                <ReactForm />
            </StrictMode>
          </div>
        </div>
      </section>


    </main><!-- /.main-content -->
@endsection