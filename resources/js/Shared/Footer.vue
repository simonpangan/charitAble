<template>
  <div class="container mt-auto">
    <footer class="d-flex flex-wrap justify-content-between align-items-center border-top">
      <p class="col-md-4 mb-0 text-muted">© 2022 charitAble</p>
      <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
         <img src="/logo/with-name.png" alt="logo" width="80" height="70" />
      </div>
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item">
          <Link href="/" class="nav-link px-2 text-muted">Home</Link>
        </li>
        <li class="nav-item">
          <Link href="/about-us" class="nav-link px-2 text-muted">About Us</Link>
        </li>
        <li class="nav-item">
          <Link href="/terms" class="nav-link px-2 text-muted">Terms</Link>
        </li>
        <li class="nav-item">
          <Link href="/faq" class="nav-link px-2 text-muted">Faq</Link>
        </li>
      </ul>
    </footer>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

