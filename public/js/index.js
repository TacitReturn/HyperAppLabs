const options = [
    { value: "$1,000", label: "Up to $1,000" },
    { value: "$3,000", label: "Up to $3,000" },
    { value: "$5,000", label: "Up to $5,000" },
];

class ReactForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: "",
            email: "",
            company: "",
            selectValue: "",
            message: "",
        };

        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(evt) {
        this.setState({
            [evt.target.name]: evt.target.value,
        });
        this.setState({ selectValue: evt.target.value });
    }

    handleSubmit(evt) {
        evt.preventDefault();
    }

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
                        <option value="1">Up to $1,000</option>
                        <option value="2">Up to $3,000</option>
                        <option value="3">Up to $5,000</option>
                        <option value="4">Above $5,000</option>
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
