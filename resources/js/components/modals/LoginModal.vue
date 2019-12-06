<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" id="loginModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-primary">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col modal-title text-center">Welcome back</div>
                            </div>
                            <div class="row justify-content-center mt-1">
                                <div class="col-6 modal-text text-center">Sign in to get great ideas, follow authors and
                                    topics you love.
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-8 row">
                                    <label class="col-md-2 col-form-label text-md-right text-hide"
                                           for="email-login">Email</label>
                                    <div class="col-md-8">
                                        <input autocomplete="email" autofocus class="form-control"
                                               id="email-login"
                                               name="email"
                                               required type="email"
                                               v-model="email" placeholder="Email">

                                        <span v-if="emailError" class="invalid-feedback" role="alert"
                                              style="display: inline-block" id="email-register-error">
                                            <strong v-for="error in emailErrors">{{error}}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center"
                                 v-bind:class="{'mt-3':!emailError, 'mt-1':emailError}">
                                <div class="row col-8">
                                    <label class="col-md-2 col-form-label text-md-right text-hide"
                                           for="password-login">Password</label>

                                    <div class="col-md-8">
                                        <input autocomplete="current-password" class="form-control"
                                               id="password-login"
                                               name="password"
                                               required type="password"
                                               v-model="password" placeholder="Password">
                                        <span v-if="passwordError" class="invalid-feedback" role="alert"
                                              style="display: inline-block">
                                            <strong v-for="error in passwordErrors" class="d-block">{{error}}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <button class="col-2 offset-5 mt-3 button-primary button-modal" @click="login">
                                    Sign in
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                email: "",
                password: "",
                emailError: false,
                passwordError: false,
                emailErrors: [],
                passwordErrors: [],
            }
        },
        methods: {
            login() {
                axios.post('/login', {
                    _token: this.csrf,
                    email: this.email,
                    password: this.password
                }).then((response) => {
                    if(response.status === 200){
                        $(location).attr('href', this.$root.home);
                    }
                }).catch((error) => {
                    console.log(error.response.data.errors);
                    let errors = error.response.data.errors;
                    if (errors.hasOwnProperty('email')) {
                        this.emailError = true;
                        this.emailErrors = errors.email;
                    }
                    if (errors.hasOwnProperty('password')) {
                        this.passwordError = true;
                        this.passwordErrors = errors.password;
                    }
                })
            }
        }
    }
</script>
