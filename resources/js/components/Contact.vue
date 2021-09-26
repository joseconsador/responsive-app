<template>
    <form class="row" @submit.prevent="onSubmit">
        <div class="col-md-6  mb-3">
            <label for="first-name" class="form-label">First Name</label>
            <input :class="{
                'form-control': true,
                'is-invalid': hasErrors('first_name')
            }" id="first-name" v-model="firstName" />
            <div class="invalid-feedback">{{ errorMessages('first_name') }}</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="last-name" class="form-label">Last Name</label>
            <input :class="{
                'form-control': true,
                'is-invalid': hasErrors('last_name')
            }" id="last-name" v-model="lastName" />
            <div class="invalid-feedback">{{ errorMessages('last_name') }}</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" :class="{
                'form-control': true,
                'is-invalid': hasErrors('email')
            }" id="email" v-model="email" />
            <div class="invalid-feedback">{{ errorMessages('email') }}</div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="row">
                <div class="col">
                    <label for="phone" class="form-label">Phone</label>
                </div>
                <small class="form-text text-muted align-right col">
                    Optional
                </small>
            </div>
            <input :class="{
                'form-control': true,
                'is-invalid': hasErrors('phone')
            }" id="phone" v-model="phone" />
        </div>
        <div class="col-12 mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input :class="{
                'form-control': true,
                'is-invalid': hasErrors('subject')
            }" id="subject" v-model="subject" />
            <div class="invalid-feedback">{{ errorMessages('subject') }}</div>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col">
                    <label for="message" class="form-label">Message</label>
                </div>
                <small class="form-text text-muted align-right col">
                    Max. 500 characters
                </small>
            </div>
            <textarea :class="{
                'form-control': true,
                'is-invalid': hasErrors('message')
            }" id="message" v-model="message"></textarea>
            <div class="invalid-feedback">{{ errorMessages('message') }}</div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary" :disabled="submitting">Submit</button>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        csrfToken: String,
    },

    data: () => ({
        errors: [],
        email: null,
        firstName: null,
        lastName: null,
        phone: null,
        subject: null,
        message: null,
        submitting: false,
    }),

    methods: {
        async onSubmit() {
            this.submitting = true;
            const data = {
                email: this.email,
                first_name: this.firstName,
                last_name: this.lastName,
                phone: this.phone,
                subject: this.subject,
                message: this.message,
            };

            try {
                const response = await fetch('/api/inquiry', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken
                    },
                    body: JSON.stringify(data)
                });

                this.errors = [];

                if (response.status == 201) {
                    alert('Thank you for your inquiry!');
                    this.email = null;
                    this.firstName = null;
                    this.lastName = null;
                    this.phone = null;
                    this.subject = null;
                    this.message = null;
                } else if (response.status == 422) {
                    const body = await response.json();
                    this.errors = body.errors;
                }
            } catch (errors) {
                // log or do something
            }

            this.submitting = false;
        }
    },

    computed: {
        errorMessages() {
            return function (field) {
                if (!!this.errors && field in this.errors) {
                    return this.errors[field].join(' ');
                }

                return null;
            }
        },

        hasErrors() {
            return function (field) {
                return !!this.errorMessages(field);
            }
        }
    }
}
</script>

<style scoped>
    .align-right {
        text-align: right;
    }
</style>