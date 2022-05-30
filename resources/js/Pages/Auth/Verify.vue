<template>
    <h2>EMAIL VERIFICATION</h2>
    <div class="card-body">
        <div v-if="$page.props.flash.resent" class="alert alert-success" role="alert">
            A fresh verification link has been sent to your email address.
        </div>

        Before proceeding, please check your email for a verification link
        <br/>
        If you did not receive the email
        <form class="d-inline" @submit.prevent="submit">
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
        </form>
    </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';

let submit = () => {
    Inertia.post(route('auth.verification.send'));
}
</script>
