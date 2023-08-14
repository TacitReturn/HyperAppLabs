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
            error_list: [],
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

        const options = {
            method: "POST",
            credentials: "same-origin",
            body: JSON.stringify(formData),
            headers: {
                "Content-type": "application/json; charset=UTF-8",
                "X-CSRF-Token": csrfToken,
            },
        };

        fetch("contact", options)
            .then((response) => response.json())
            .then((json) => console.log(json))
            .then((json) => console.log(json.data.validate_err));
        // .catch((error) => console.log(JSON.stringify(error.errors)));
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit} class="form-row input-border">
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
                        required
                        value={this.state.name}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        type="text"
                        name="name"
                        placeholder="Name"
                    />
                    <span className="text-danger">
                        {this.state.error_list.name}
                    </span>
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        required
                        value={this.state.email}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        type="email"
                        name="email"
                        placeholder="Email"
                    />
                    <span className="text-danger">
                        {this.state.error_list.email}
                    </span>
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <input
                        required
                        value={this.state.company}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        type="text"
                        name="company"
                        placeholder="Company Name"
                    />
                    <span className="text-danger">
                        {this.state.error_list.company}
                    </span>
                </div>

                <div class="form-group col-sm-6 col-xl-3">
                    <select
                        required
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        name="budget"
                    >
                        <option value="1000">Up to $1,000</option>
                        <option value="3000">Up to $3,000</option>
                        <option value="5000">Up to $5,000</option>
                        <option value="+5000">Above $5,000</option>
                    </select>
                    <span className="text-danger">
                        {this.state.error_list.budget}
                    </span>
                </div>

                <div class="form-group col-12">
                    <textarea
                        required
                        value={this.state.message}
                        onChange={this.handleChange}
                        class="form-control form-control-lg"
                        rows="4"
                        placeholder="Project Requirements"
                        name="message"
                    ></textarea>
                    <span className="text-danger">
                        {this.state.error_list.message}
                    </span>
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
