<template>
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">© 2022 charitAble</p>
      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        Logo
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
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
          <Link href="/privacy" class="nav-link px-2 text-muted">Privacy</Link>
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