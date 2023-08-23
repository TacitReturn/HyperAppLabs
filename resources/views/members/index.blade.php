@extends("layouts.hyperapp")
@section("content")
<main class="main-content">
    <section class="section bg-gray">
        <div class="container">
            <div class="row gap-y align-items-center">

                <div class="col-md-4">
                    <p class="lead-7 text-dark fw-600 lh-2">
                        Pricing plans
                    </p>

                    <div class="btn-group btn-group-toggle my-7" data-toggle="buttons">
                        <label class="btn btn-round btn-outline-dark w-150 active">
                            <input type="radio" name="pricing-6" value="monthly" autocomplete="off" checked> Monthly
                        </label>
                    </div>

                    <p class="lead">Get premium membership to HyperApp Labs for a small price of 6.95 a month.</p>
                </div>

                <div class="col-md-7 ml-auto">
                    <div class="row gap-y">

                        <div class="col-md-6">
                            <div class="card text-center shadow-1 hover-shadow-9">
                                <div class="card-img-top text-white bg-img h-200 d-flex align-items-center" style="background-color: #000000" data-overlay="1">
                                    <div class="position-relative w-100">
                                        <p class="lead-4 text-uppercase fw-600 ls-1 mb-0">Zealous Developer</p>
                                        <p><span data-bind-radio="pricing-6" data-monthly="Monthly" data-yearly="Yearly">Monthly</span> Package</p>
                                    </div>
                                </div>
                                <div class="card-body py-6">
                                    <p class="lead-7 fw-600 text-dark">
                                        <span data-bind-radio="pricing-6" data-monthly="$6." data-yearly="$85.">$6.</span><span class="lead-4 align-text-top">95</span></p>
                                    <p>
                                        All Courses<br>
                                        Premium Community Access<br>
                                        Consulting at a discount<br>
                                    </p>
                                    <br>
                                    <div><a class="btn btn-round btn-outline-secondary w-200" href="#">Sign up</a></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <header class="section-header">
                <small>FAQ</small>
                <h2>Frequently Asked Questions</h2>
                <hr>
                <p>Have a question? We've got answers. If you don't find an answer to your question here, contact us via email.</p>
            </header>


            <div class="row gap-y">
                <div class="col-md-6 col-xl-4">
                    <h5>Is this a secure site for purchases?</h5>
                    <p>Absolutely! We work with top payment companies which guarantees your safety and security. All billing information is stored on our payment processing partner which has the most stringent level of certification available in the payments industry.</p>
                </div>


                <div class="col-md-6 col-xl-4">
                    <h5>Can I cancel my subscription?</h5>
                    <p>You can cancel your subscription anytime in your account. Once the subscription is cancelled, you will not be charged next month. You will continue to have access to your account until your current subscription expires. And after that you will still have access to Hyperapp Labs Standard.</p>
                </div>


                <div class="col-md-6 col-xl-4">
                    <h5>How long are your contracts?</h5>
                    <p>Currently, we only offer monthly subscription. You can upgrade or cancel your monthly account at any time with no further obligation.</p>
                </div>


                <div class="col-md-6 col-xl-4">
                    <h5>Can I update my card details?</h5>
                    <p>Yes. Go to the billing section of your dashboard and update your payment information.</p>
                </div>


                <div class="col-md-6 col-xl-4">
                    <h5>Can I request refund?</h5>
                    <p>Unfortunately, no. We do not issue full or partial refunds for any reason.</p>
                </div>


                <div class="col-md-6 col-xl-4">
                    <h5>Can I try your service for free?</h5>
                    <p>Of course! We’re happy to offer a free plan to anyone who wants to try our service.</p>
                </div>
            </div>

        </div>
    </section>


</main>



<!-- Scripts -->
<script src="../assets/js/page.min.js"></script>
<script src="../assets/js/script.js"></script>

</body>
</html>

@endsection
