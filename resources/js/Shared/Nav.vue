<template>
  <nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
    <div class="container">
      <Link class="navbar-brand me-2" href="/">
        <img src="/logo/logo-only.png" alt="logo" width="50" height="90">
      </Link>
   
      <ul v-if="auth === undefined" class="navbar-nav ms-auto d-flex align-items-center">
        <li class="nav-item">
          <NavLink class="nav-link" href="/login">
            <span class="d-none d-lg-inline me-1">Login</span>
            <i class="far fa-sign-in"></i>
          </NavLink>
        </li>
      </ul>
      <ul v-else class="navbar-nav ms-auto d-flex align-items-center">
        <BenefactorNav v-if="role == 'BENEFACTOR'"/>
        <AdminNav v-if="role == 'ADMIN'"/>
        <CharityNav v-if="role == 'CHARITY_SUPER_ADMIN' || role == 'CHARITY_ADMIN'"/>
      </ul>
    </div>
  </nav>
</template>

<script setup>
import NavLink from "./Nav/NavLink";
import BenefactorNav from "./Nav/BenefactorNav";
import AdminNav from "./Nav/AdminNav";
import CharityNav from "./Nav/CharityNav";
import { computed } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    search: '',
})

let submit = () => {
    form.get('/benefactor/charity-search');
}
</script>

<script>
export default {
  computed: {
      auth() {
        return this.$page.props.auth;
      },
      role() {
        return {
          1: 'ADMIN',
          2: 'CHARITY_SUPER_ADMIN',
          3: 'CHARITY_ADMIN',
          4: 'BENEFACTOR',
        }[this.auth.user.roleID]
      },
    }
}
</script>