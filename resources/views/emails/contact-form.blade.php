@component('mail::message')
# Business Inuiry
## This business inquiry is from {{ $contactForm->name }}
<p>Email: {{ $companyForm->email }}</p> <br />
<p>Company {{ $companyForm->company }}</p> <br />
<p>Budget: {{ $companyForm->budget }}</p> <br />
<p>Message: {{ $companyForm->message }}</p> <br />

Thank you,<br>
{{ config('app.name') }}
@endcomponent
