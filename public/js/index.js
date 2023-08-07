// import React, { Component } from "react";

class ReactForm extends Component {
    render() {
        return (
            <form
                class="form-row input-border"
                action="../assets/php/sendmail.php"
                method="POST"
                data-form="mailer"
            >
                <div class="col-12">
                    <div class="alert alert-success d-on-success">
                        We received your message and will contact you back soon.
                    </div>
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        class="form-control form-control-lg"
                        type="text"
                        name="name"
                        placeholder="Name"
                    />
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        class="form-control form-control-lg"
                        type="email"
                        name="email"
                        placeholder="Email"
                    />
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        class="form-control form-control-lg"
                        type="text"
                        name="company"
                        placeholder="Company Name"
                    />
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
                    <textarea
                        class="form-control form-control-lg"
                        rows="4"
                        placeholder="Project Requirements"
                        name="message"
                    ></textarea>
                </div>

                <div class="col-12 text-center">
                    <button
                        class="btn btn-xl btn-block btn-primary"
                        type="submit"
                    >
                        Submit Inquiry
                    </button>
                </div>
            </form>
        );
    }
}

ReactDOM.render(<ReactForm />, document.querySelector("#react-app"));
