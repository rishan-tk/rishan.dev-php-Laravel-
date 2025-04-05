<div x-data="contactForm()" x-init="reset()">
    <h2>Contact Form</h2>
    <form @submit.prevent="submitForm">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" x-model="form.name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" x-model="form.email" required>
        </div>
        <div>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" x-model="form.subject" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" x-model="form.message" required></textarea>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" x-model="form.privacyPolicyAccepted" />
                I accept the <a href="#">Privacy Policy</a>
            </label>
        </div>

        <button type="submit">Submit</button>

        <template x-if="errors.privacy">
            <div class="error-message">Please accept the privacy policy before submitting the form.</div>
        </template>
        <template x-if="errors.general">
            <div class="error-message">Error sending email. Please try again later.</div>
        </template>
        <template x-if="success">
            <div class="success-message">Your message has been sent successfully!</div>
        </template>
    </form>
</div>

<script>
function contactForm() {
    return {
        form: {
            name: '',
            email: '',
            subject: '',
            message: '',
            privacyPolicyAccepted: false
        },
        errors: {
            privacy: false,
            general: false
        },
        success: false,

        reset() {
            this.form = {
                name: '',
                email: '',
                subject: '',
                message: '',
                privacyPolicyAccepted: false
            };
            this.errors = { privacy: false, general: false };
            this.success = false;
        },

        async submitForm() {
            this.errors = { privacy: false, general: false };
            this.success = false;

            if (!this.form.privacyPolicyAccepted) {
                this.errors.privacy = true;
                return;
            }

            try {
                const response = await fetch("{{ route('contact.submit') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                    },
                    body: JSON.stringify(this.form)
                });

                if (response.ok) {
                    this.success = true;
                    this.reset();
                } else {
                    this.errors.general = true;
                }
            } catch (error) {
                this.errors.general = true;
                console.error("Error:", error);
            }
        }
    }
}
</script>
