<template>
  <nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
    <div class="container">
      <a class="navbar-brand mr-2" href="index.html">
        Logo
        <!-- <img src="img/logo.svg" alt="LOGO" /> -->
      </a>
      <ul class="navbar-nav ml-auto d-flex align-items-center">
        <li class="nav-item">
          <NavLink class="nav-link" href="/login">
            <i class="feather-briefcase mr-2"></i>
            <span class="d-none d-lg-inline">Login</span>
          </NavLink>
        </li>
        <li class="nav-item">
          <NavLink class="nav-link" href="/register/benefactor">
            <i class="feather-users mr-2"></i>
            <span class="d-none d-lg-inline">Register</span>
          </NavLink>
        </li>
        <li class="nav-item">
          <NavLink class="nav-link btn btn-link" href="/logout" 
            method="post" as="button">
            <i class="feather-users mr-2"></i>
            <span class="d-none d-lg-inline">Logout</span>
          </NavLink>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
  import NavLink from "./NavLink";

  export default {
    name: "nav",
    components: {
      NavLink
    },
  };
</script>