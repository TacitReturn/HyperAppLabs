// TODO: Complete react form, send the contents of formData to the backend
const csrfToken = document.head.querySelector(
    "[name~=csrf-token][content]"
).content;

class ReactForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: "",
            email: "",
            company: "",
            budget: "",
            message: "",
            success: [],
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(evt) {
        this.setState({
            [evt.target.name]: evt.target.value,
        });
    }

    handleSubmit(evt) {
        evt.preventDefault();

        const formData = {
            name: evt.target.name.value,
            email: evt.target.email.value,
            company: evt.target.company.value,
            budget: evt.target.budget.value,
            message: evt.target.message.value,
        };

        fetch("/contact", {
            method: "POST",
            credentials: "same-origin",
            body: JSON.stringify(formData),
            headers: {
                "Content-type": "application/json; charset=UTF-8",
                "X-CSRF-Token": csrfToken,
            },
        }).then((response) => {
            return response.json();
        });
        // .then((response) => response.json())
        // .then((json) => console.log(json))
        // .catch((err) => {
        //     console.log(err);
        // });
    }

    render() {
        return (
            <form
                onSubmit={this.handleSubmit}
                class="form-row input-border"
                action="../assets/php/sendmail.php"
            >
                <div class="col-12">
                    {this.state.success.length > 0 ? (
                        <div class="alert alert-success d-on-success">
                            We received your message and will contact you back
                            soon. foo
                        </div>
                    ) : (
                        ""
                    )}
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        value={this.state.name}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        type="text"
                        name="name"
                        placeholder="Name"
                    />
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        value={this.state.email}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        type="email"
                        name="email"
                        placeholder="Email"
                    />
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        value={this.state.company}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        type="text"
                        name="company"
                        placeholder="Company Name"
                    />
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <select
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        name="budget"
                    >
                        <option value="1000">Up to $1,000</option>
                        <option value="3000">Up to $3,000</option>
                        <option value="5000">Up to $5,000</option>
                        <option value="+5000">Above $5,000</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <textarea
                        value={this.state.message}
                        onChange={this.handleChange}
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
