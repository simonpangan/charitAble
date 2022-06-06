<template>
  <div class="bg-white">
    <div class="container">
      <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-md-8 mx-auto">
          <div class="osahan-login py-4">
            <div class="text-center mb-4">
              <a href="index.html"><img src="img/logo.svg" alt="" /></a>
              <h5 class="font-weight-bold">First, let's find your account</h5>
              <p class="text-muted">Please enter your email address</p>
            </div>
            <form @submit.prevent="submit">
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"
                  >Email Address</label
                >
                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    :class="{ 'is-invalid': form.errors.email }"
                    class="form-control"
                    v-model="form.email"
                    required
                    autocomplete="email"
                    autofocus
                  />
                  <span
                    v-if="form.errors.email"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.email"></strong>
                  </span>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button
                    type="submit"
                    :disabled="form.processing"
                    class="btn btn-primary"
                  >
                    Send Password Reset Link
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
  email: "",
});

let submit = () => {
  form.post(route("auth.password.email"));
};
</script>
