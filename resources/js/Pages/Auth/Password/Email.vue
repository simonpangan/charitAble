<template>
  <div class="bg-white">
    <div class="container">
      <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-md-4 mx-auto">
          <div class="py-4">
            <div class="text-center mb-4">
              <h5 class="font-weight-bold">First, let's find your account</h5>
              <p class="text-muted">Please enter your email address</p>
            </div>
            <form @submit.prevent="submit">
              <div v-if="$page.props.flash.status" 
                v-text="$page.props.flash.status" 
                class="alert alert-success w-80 mx-auto text-center" role="alert">
              </div>
              <div class="mb-3">
                <label class="mb-1">Email</label>
                <input id="email" type="email" v-model="form.email" 
                  :class="{ 'is-invalid': form.errors.email }" 
                  class="form-control" 
                />
                <span v-if="form.errors.email" class="invalid-feedback d-block" role="alert">
                  <strong v-text="form.errors.email"></strong>
                </span>
              </div>
              <button type="submit" :disabled="form.processing" class="btn btn-primary d-block w-100 text-uppercase"> Send Password Reset Link </button>
              <div class="py-3 d-flex align-item-center">
                <Link :href="$route('auth.index')">Sign In</Link>
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
    useForm
  } from "@inertiajs/inertia-vue3";

  let form = useForm({
    email: "",
  });

  let submit = () => {
    form.post(route("auth.password.email"));
  };
</script>