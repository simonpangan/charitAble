<template>
  <div class="bg-white">
    <div class="container">
      <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-md-4 mx-auto">
          <div class="osahan-login py-4">
            <div class="text-center mb-4">
              <a href="index.html"><img src="img/logo.svg" alt="" /></a>
              <h5 class="font-weight-bold mt-3">We're almost there!</h5>
              <p class="text-muted">Please check your email inbox.</p>
            </div>
            <div v-if="$page.props.flash.resent" class="alert alert-success" role="alert" >
                A fresh verification link has been sent to your email address.
            </div>
            <br />
            If you did not receive the email
            <form class="d-inline" @submit.prevent="submit">
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                click here to request another
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";

let submit = () => {
  Inertia.post(route("auth.verification.send"));
};
</script>
