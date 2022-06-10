<template>
  <div class="bg-white">
    <div class="container">
      <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-md-4 mx-auto">
          <div class="py-4">
            <div class="text-center mb-4">
              <a href="index.html">
                <img src="img/logo.svg" alt="charitAble logo" />
              </a>
              <h5 class="font-weight-bold">First, let's find your account</h5>
              <p class="text-muted">Please enter your email address</p>
            </div>
            <form @submit.prevent="submit">
              <input type="hidden" v-model="form.token" />
              <div class="mb-3">
                <label class="mb-1">Email</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-user position-absolute"></i>
                  <input id="email" type="email" v-model="form.email" 
                    :class="{ 'is-invalid': form.errors.email }" 
                    class="form-control" 
                  />
                </div>
                <span v-if="form.errors.email" 
                    class="invalid-feedback d-block" role="alert">
                  <strong v-text="form.errors.email"></strong>
                </span>
              </div>
            <div class="mb-3">
                <label class="mb-1">Password</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-unlock position-absolute"></i>
                  <input type="password" v-model="form.password" 
                    :class="{ 'is-invalid': form.errors.password }" 
                    class="form-control" 
                  />
                </div>
                <span v-if="form.errors.password" class="invalid-feedback d-block" role="alert">
                  <strong v-text="form.errors.password"></strong>
                </span>
              </div>
            <div class="mb-3">
                <label class="mb-1">Confirm Password</label>
                <div class="position-relative icon-form-control">
                  <i class="feather-unlock position-absolute"></i>
                  <input type="password" v-model="form.password_confirmation" 
                    :class="{ 'is-invalid': form.errors.password_confirmation }" 
                    class="form-control" 
                  />
                </div>
              </div>
              <button type="submit" :disabled="form.processing" class="btn btn-primary d-block w-100 text-uppercase"> Send Password Reset Link </button>
              <div class="py-3 d-flex align-item-center">
                <Link :href="$route('auth.index')">Sign In</Link>
                <span class="ms-auto"> New to Osahanin? 
                  <a class="fw-bold" href="sign-up.html">Join now</a>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { 
        useForm, Link 
    } from "@inertiajs/inertia-vue3";

let props = defineProps({
    token: String,
    email   : String,
})

let form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: ''
});

let submit = () => {
    form.post(route('auth.password.update'));
}
</script>
