<template>
    <form>
        <input type="hidden" v-model="form.token" />
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" v-model="form.email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" v-model="form.password">
            </div>
        </div>
        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="form.password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const routes = {
    passwordUpdate: route('auth.password.update'),
}

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
    form.post('/users');
}
</script>
