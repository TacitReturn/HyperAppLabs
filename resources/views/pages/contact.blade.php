@extends("layouts.hyperapp")
@section("content")
    <section class="section bg-gray">
        <div class="container">
            <header class="section-header">
                <small>Contact</small>
                <h2 class="display-4">Let's Talk</h2>
                <hr>
                <p class="lead">Have a question about Hyperapp Labs? Contact us here.</p>
            </header>

            <form class="form-row input-border" action="../assets/php/sendmail.php" method="POST" data-form="mailer">
                <div class="col-12">
                    <div class="alert alert-success d-on-success">We received your message and will contact you back soon.</div>
                </div>

                <div class="form-group col-sm-6 col-xl-6">
                    <input class="form-control form-control-lg" type="text" name="name" placeholder="Name">
                </div>

                <div class="form-group col-sm-6 col-xl-6">
                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Email">
                </div>

                <div class="form-group col-12">
                    <input class="form-control form-control-lg" type="text" name="subject" placeholder="Subject">
                </div>

                <div class="form-group col-12">
                    <textarea class="form-control form-control-lg" rows="4" placeholder="Message" name="message"></textarea>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-xl btn-block btn-primary" type="submit">Contact Us</button>
                </div>
            </form>

        </div>
    </section>
@endsection
