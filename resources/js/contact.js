/**
 * Alpine.js data component for the contact form.
 * Handles AJAX submission with CSRF, validation errors, and status feedback.
 */
export default () => ({
  form: {
    name: '',
    email: '',
    subject: '',
    message: '',
    website: '', // honeypot
  },
  errors: {},
  status: '',
  sending: false,

  async submit() {
    this.errors = {};
    this.status = '';
    this.sending = true;

    try {
      const token = document.querySelector('meta[name="csrf-token"]')?.content;
      const res = await fetch('/contactme', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': token,
          'X-Requested-With': 'XMLHttpRequest',
        },
        body: JSON.stringify(this.form),
      });

      const data = await res.json();

      if (!res.ok) {
        if (res.status === 422 && data.errors) {
          this.errors = data.errors;
        } else if (res.status === 429) {
          this.status = 'Rate limit reached. Please try again later.';
        } else {
          this.status = data.message || 'Something went wrong.';
        }
        return;
      }

      this.status = data.message || 'Message sent successfully!';
      this.form = { name: '', email: '', subject: '', message: '', website: '' };
    } catch {
      this.status = 'Network error. Please try again.';
    } finally {
      this.sending = false;
    }
  },
});
