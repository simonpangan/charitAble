<template>
     <Head title="Login" />

    <div class="container">
        <br />
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-4 mx-auto">
                <div class="py-4" :class="{ 'osahan-login': ! form.hasErrors }">
                    <div class="text-center mb-4">
                        <h5 class="fw-bold mt-3">Welcome Back</h5>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="email" class="mb-1">Email</label>
                            <div class="icon-form-control position-relative">
                                <i class="far fa-at position-absolute mt-2 ms-3"></i>
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
                            <div class="input-group mb-3 d-flex">
                                <div class="icon-form-control position-relative flex-fill">
                                     <i class="far fa-lock position-absolute mt-2 ms-3"></i>
                                    <input v-model="form.password" 
                                        :type="(showPassword) ? 'text' : 'password'"
                                        class="form-control" :class="{ 'is-invalid': form.errors.password }"
                                    />
                                </div>
                                <button type="button" @click="toggleShow" 
                                    class="btn input-group-icon" id="inputGroup-sizing-default">
                                    <span v-if="showPassword">
                                        <i  class="fas fa-1x fa-eye-slash"></i>
                                    </span>
                                    <span v-else>
                                        <i  class="fas fa-1x fa-eye"></i>
                                    </span>
                                </button>
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
                            <i class="fal fa-sign-in"></i>
                        </button>
                        <div class="text-center mt-3 border-bottom pb-3">
                            <p class="small text-muted">Or</p>
                            <div class="text-center">
                                <a :href="$route('auth.google.index')"
                                    class="btn btn-light text-uppercase w-100">
                                    <i class="fab fa-google me-1"></i>
                                    Sign in with google
                                </a>
                            </div>
                        </div>
                        <div class="py-3 align-item-center mb-3">
                        <div class="text-center">
                            <div class="text-center">
                                <a :href="$route('register.benefactor.index')"
                                    class="btn btn-light text-uppercase w-100">
                                   Sign up as Benefactor
                                </a>
                            </div>
                        </div>

                            <Link :href="$route('auth.password.request')">
                                Forgot password?
                            </Link>

                            <div class="ms-auto mt-3">
                                Are you an NGO or a Charity? Let's work 
                                <Link class="fw-bold" :href="$route('register.charity.index')">
                                    together.
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
import { ref } from 'vue';

let showPassword = ref(false);

const props = defineProps(['errors'])

let form = useForm({
    email: '',
    password: '',
    remember: '',
})

let toggleShow = () => {
    showPassword.value = ! showPassword.value;
}

let submit = () => {
    form.post(route('auth.login'));
}

</script>
