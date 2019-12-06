<template>
    <div>
        <div aria-hidden="true" class="modal fade" id="registerModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-primary">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col modal-title text-center">Join Idea Talk</div>
                            </div>
                            <div class="row justify-content-center mt-1">
                                <div class="col-6 modal-text text-center">Create an account to know great ideas in
                                    short time, create your projects, and follow authors and projects that you love.
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">
                                <div class="row col-8">
                                    <label for="name-register"
                                           class="col-md-2 col-form-label text-md-right text-hide">Name</label>

                                    <div class="col-md-8">
                                        <input id="name-register" type="text"
                                               class="form-control" name="name"
                                               value="" required autocomplete="name" autofocus
                                               v-model="name" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">
                                <div class="col-8 row">
                                    <label class="col-md-2 col-form-label text-md-right text-hide"
                                           for="email-register">Email</label>
                                    <div class="col-md-8">
                                        <input autocomplete="email" autofocus class="form-control" id="email-register"
                                               name="email"
                                               required type="email"
                                               v-model="email" placeholder="Email">

                                        <span v-if="emailError" class="invalid-feedback" role="alert"  style="display: inline-block" id="email-register-error">
                                            <strong v-for="error in emailErrors">{{error}}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center" v-bind:class="{'mt-3':!emailError, 'mt-1':emailError}">
                                <div class="row col-8">
                                    <label class="col-md-2 col-form-label text-md-right text-hide" for="password-register">Password</label>

                                    <div class="col-md-8">
                                        <input autocomplete="current-password" class="form-control"
                                               id="password-register"
                                               name="password"
                                               required type="password"
                                               v-model="password" placeholder="Password">
                                        <span v-if="passwordError" class="invalid-feedback" role="alert"  style="display: inline-block">
                                            <strong v-for="error in passwordErrors" class="d-block">{{error}}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center" v-bind:class="{'mt-3':!emailError, 'mt-1':emailError}">
                                <div class="row col-8">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right text-hide">Repeat Password</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password"
                                               v-model="confirmPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <button class="col-2 offset-5 mt-3 button-primary button-modal" @click="register">
                                        Register
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
                name: "",
                email: "",
                password: "",
                confirmPassword: "",
                emailError: false,
                passwordError: false,
                emailErrors:[],
                passwordErrors:[],
            }
        },
        methods: {
            register() {
                axios.post('/register', {
                    _token: this.csrf,
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.confirmPassword
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
