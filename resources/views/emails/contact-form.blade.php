@component('mail::message')
# Business Inuiry
## This business inquiry is from {{ $contactForm->name}}
<p>Email: {{ $contactForm->email }}</p> <br />
<p>Company {{ $contactForm->company }}</p> <br />
<p>Budget: {{ $contactForm->budget }}</p> <br />
<p>Message: {{ $contactForm->message }}</p> <br />
@endcomponent
