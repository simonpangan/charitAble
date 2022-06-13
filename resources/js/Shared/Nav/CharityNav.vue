<template>
	<li class="nav-item">
		<NavLink class="nav-link btn btn-link" href="#" 
			method="post" as="button">
			<i class="feather-users me-2"></i>
			<span class="d-none d-lg-inline">Charity Profile</span>
		</NavLink>
		</li>
		<li class="nav-item dropdown no-arrow ms-1 osahan-profile-dropdown">
		<a class="nav-link dropdown-toggle pe-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img class="img-profile rounded-circle" src="img/p13.png">
		</a>
		<div class="dropdown-menu dropdown-menu-end shadow-sm">
			<NavLink class="dropdown-item btn btn-link" href="/logout" 
			method="post" as="button">
			<i class="feather-log-out me-1"></i>
			<span class="d-none d-lg-inline">Logout</span>
			</NavLink>
		</div>
	</li>
</template>

<script setup>
import NavLink from "./NavLink";
</script>