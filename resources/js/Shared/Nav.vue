<template>
  <nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
    <div class="container">
      <a class="navbar-brand mr-2" href="/">
        Logo
      </a>
      <ul v-if="auth === undefined" class="navbar-nav ml-auto d-flex align-items-center">
        <li class="nav-item">
          <NavLink class="nav-link" href="/login">
            <i class="feather-log-in mr-2"></i>
            <span class="d-none d-lg-inline">Login</span>
          </NavLink>
        </li>
      </ul>
      <ul v-else class="navbar-nav ml-auto d-flex align-items-center">
        <template v-if="role == 'BENEFACTOR'">
          <li class="nav-item">
            <NavLink class="nav-link btn btn-link" href="/benefactor/home">
              <i class="feather-users mr-2"></i>
              <span class="d-none d-lg-inline">Home</span>
            </NavLink>
          </li>
          <li class="nav-item">
            <NavLink class="nav-link btn btn-link" href="/benefactor/charity-search">
              <i class="feather-users mr-2"></i>
              <span class="d-none d-lg-inline">Charities</span>
            </NavLink>
          </li>
          <li class="nav-item">
            <!-- <NavLink class="nav-link btn btn-link" href="#" 
                method="post" as="button">
              <i class="feather-users mr-2"></i>
              <span class="d-none d-lg-inline">Benefactor Profile</span>
            </NavLink> -->
          </li>
        </template>
        <template v-if="role == 'CHARITY_SUPER_ADMIN' || role == 'CHARITY_ADMIN'">
          <li class="nav-item">
            <NavLink class="nav-link btn btn-link" href="#" 
                method="post" as="button">
              <i class="feather-users mr-2"></i>
              <span class="d-none d-lg-inline">Charity Profile</span>
            </NavLink>
          </li>
        </template>
        <li class="nav-item">
          <NavLink class="nav-link btn btn-link" href="/logout" 
              method="post" as="button">
            <i class="feather-log-out mr-2"></i>
            <span class="d-none d-lg-inline">Logout</span>
          </NavLink>
        </li>
        <li class="nav-item dropdown no-arrow ms-1 osahan-profile-dropdown">
          <a class="nav-link dropdown-toggle pe-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="img-profile rounded-circle" src="img/p13.png">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow-sm">
              <div class="p-3 d-flex align-items-center">
                  <div class="dropdown-list-image me-3">
                      <img class="rounded-circle" src="img/user.png" alt="">
                      <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="fw-bold">
                      <div class="text-truncate">Gurdeep Osahan</div>
                      <div class="small text-gray-500">UI/UX Designer</div>
                  </div>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="profile.html"><i class="feather-edit me-1"></i> My Account</a>
              <a class="dropdown-item" href="edit-profile.html"><i class="feather-user me-1"></i> Edit Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="sign-in.html"><i class="feather-log-out me-1"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script setup>
import NavLink from "./NavLink";
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

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