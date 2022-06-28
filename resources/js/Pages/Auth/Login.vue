<template>
     <Head title="Login" />

    <div class="container">
        <br />
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-md-4 mx-auto">
                <div class="py-4" :class="{ 'osahan-login': ! form.hasErrors }">
                    <div class="text-center mb-4">
                        <h5 class="fw-bold mt-3">Welcome Back</h5>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="email" class="mb-1">Email</label>
                            <div class="icon-form-control position-relative">
                                <i class="feather-user position-absolute"></i>
                                <input  v-model="form.email" type="text"
                                    class="form-control" id="email"
                                    :class="[{'is-invalid': props.errors.google_login}, 
                                        {'is-invalid': form.errors.email}]"
                                />  
                            </div>
                            <span v-if="form.errors.email" v-text="form.errors.email"
                                class="invalid-feedback d-block" role="alert">
                            </span>
                            <span v-if="props.errors.google_login" 
                                    v-text="props.errors.google_login"
                                class="invalid-feedback d-block" role="alert">
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">Password</label>
                            <div class="icon-form-control position-relative">
                                <i class="position-absolute feather-unlock"></i>
                                <input v-model="form.password" type="password"
                                    class="form-control" :class="{ 'is-invalid': form.errors.password }">
                            </div>
                            <span v-if="form.errors.password" v-text="form.errors.password"
                                class="invalid-feedback d-block" role="alert">
                            </span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="form.remember" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember Me
                            </label>
                        </div>
                        <br />
                        <button :disabled="form.processing" type="submit" 
                                class="btn btn-primary btn-block text-uppercase w-100"> 
                            Sign in 
                        </button>
                        <div class="text-center mt-3 border-bottom pb-3">
                            <p class="small text-muted">Or</p>
                            <div class="text-center">
                                <a :href="$route('auth.google.index')" 
                                    class="btn btn-light text-uppercase w-100">
                                    Sign in with google
                                </a>
                            </div>
                        </div>
                        <div class="py-3 d-flex align-item-center">
                            <Link :href="$route('auth.password.request')">
                                Forgot password?
                            </Link>
                            <div class="ms-auto">
                                New to charitAble? 
                                Join now as 
                                <Link class="fw-bold" :href="$route('register.charity.index')">
                                    Charity
                                </Link>
                                or
                                <Link class="fw-bold" :href="$route('register.benefactor.index')">
                                    Benefactor
                                </Link>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3"

const props = defineProps(['errors'])

let form = useForm({
    email: '',
    password: '',
    remember: '',
})

let submit = () => {
    form.post(route('auth.login'));
}

</script>
