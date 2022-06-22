<template>
  <div>
    <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
      <li class="nav-item">
        <Link class="nav-link" id="home-tab" 
          :href="$route('benefactor.connections.charities.index')"
          :class="{ 'active': $page.component === 'Benefactor/Connections/Charities' }"
          :only="['followingList']"
        > 
          Charities 
        </Link>
      </li>
      <li class="nav-item">
        <Link class="nav-link" id="home-tab" 
          :href="$route('benefactor.connections.volunteer.index')"
          :class="{ 'active': $page.component === 'Benefactor/Connections/Volunteer' }"
        > 
          Volunteer
        </Link>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Programs </a>
      </li>
      <li class="nav-item ms-auto me-3">
        <input type="email" class="form-control mt-2" placeholder="Search" />
      </li>
    </ul>
  </div>
</template>

<script setup>

</script>