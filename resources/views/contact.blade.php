@extends("layouts.blog")
@section("content")
    <section class="section">
        <div class="container">

            <h2 class="text-center">Contact Us lorem</h2>
            <p class="lead text-center">
                Have a project in mind? Or want to refactor an existing project? Get in touch with us.
            </p>
            <div class="row gap-y mt-8">
                <form class="col-lg-6" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="">{{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" type="text" name="name"
                                   placeholder="Company Name">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" type="text" name="subject"
                                   placeholder="Subject">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Email">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" type="text" name="phone" placeholder="Phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control form-control-lg" rows="4" placeholder="What do you have in mind?"
                                  name="message"></textarea>
                    </div>

                    <button class="btn btn-lg btn-primary" type="submit">Send message</button>

                </form>


                <div class="col-lg-5 ml-auto text-center text-lg-left">
                    <hr class="d-lg-none">
                    <h5>Miami, FL</h5>
                    <p>2651 Main Street, Suit 124<br>Miami, FL, 98101</p>
                    <p>+1 (321) 654 9870<br>+1 (987) 123 6548</p>
                    <p>contact@hyperapplabs.com</p>
{{--                    <div class="fw-400">Follow Us</div>--}}
{{--                    <div class="social social-sm social-inline">--}}
{{--                        <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                        <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                        <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>--}}
{{--                        <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div>

    </section>
@endsection
