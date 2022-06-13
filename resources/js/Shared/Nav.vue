<template>
  <nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
    <div class="container">
      <a class="navbar-brand me-2" href="/">
        Logo
      </a>
      <form class="d-none d-sm-inline-block form-inline me-auto my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input v-model="form.seach" type="text" class="form-control shadow-none border-0 text-white" 
              placeholder="Search peopse, jobs & more..." 
              aria-label="Search" 
              aria-describedby="basic-addon2"
            />
            <div class="input-group-append">
              <button class="btn h-100" type="submit">
                <i class="feather-search"></i>
              </button>
            </div>
        </div>
      </form>
      <ul v-if="auth === undefined" class="navbar-nav ms-auto d-flex align-items-center">
        <li class="nav-item">
          <NavLink class="nav-link" href="/login">
            <i class="feather-log-in me-2"></i>
            <span class="d-none d-lg-inline">Login</span>
          </NavLink>
        </li>
      </ul>
      <ul v-else class="navbar-nav ms-auto d-flex align-items-center">
        <BenefactorNav v-if="role == 'BENEFACTOR'"/>
        <CharityNav v-if="role == 'CHARITY_SUPER_ADMIN' || role == 'CHARITY_ADMIN'"/>
      </ul>
    </div>
  </nav>
</template>

<script setup>
import NavLink from "./Nav/NavLink";
import BenefactorNav from "./Nav/BenefactorNav";
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