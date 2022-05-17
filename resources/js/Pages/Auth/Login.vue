<template>
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="index.html"><img src="img/logo.svg" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                        <p class="text-muted">Don't miss your next opportunity. Sign in to stay updated on your
                            professional world.</p>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label class="mb-1">Email or Phone</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input v-model="form.email" type="text" class="form-control">
                                <span v-if="form.errors.email" v-text="form.errors.email"
                                      class="alert alert-danger"> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input v-model="form.password" type="password" class="form-control">
                                <span v-if="form.errors.password" v-text="form.errors.password"
                                      class="alert alert-danger"> </span>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary text-uppercase mt-3 px-5" type="submit"> Agree & Join
                            </button>
                        </div>
                        <div class="text-center mt-3 border-bottom pb-3">
                            <p class="small text-muted">Or login with</p>
                            <div class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-instagram btn-block px-5"><i
                                    class="feather-instagram"></i> Sign Up Using Google
                                </button>
                            </div>
                        </div>
                        <div class="py-3 d-flex align-item-center">
                            <a href="forgot-password.html">Forgot password?</a>
                            <span class="ml-auto"> New to Osahanin? <a class="font-weight-bold" href="sign-up.html">Join now</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3"

let form = useForm({
    email: '',
    password: '',
})

let submit = () => {
    form.post(route('login'));
}
</script>
