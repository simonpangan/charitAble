<template>
	<li class="nav-item">
		<NavLink class="nav-link btn btn-link" :href="$route('charity.profile.index')">
			<i class="fad fa-user-alt me-2 fa-lg"></i>
			<span class="d-none d-lg-inline">Profile</span>
		</NavLink>
		</li>
		<li class="nav-item dropdown no-arrow ms-1 osahan-profile-dropdown">
		<a class="nav-link dropdown-toggle pe-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-bars fa-lg"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-end shadow-sm">
			<NavLink class="dropdown-item btn btn-link" href="/charity/logs">
				<i class="far fa-receipt me-1"></i>
				Logs
			</NavLink>
			<NavLink class="dropdown-item btn btn-link" href="/logout" method="post" as="button">
				<i class="fas fa-sign-out me-1"></i>
				Logout
			</NavLink>
		</div>
	</li>
</template>

<script setup>
import NavLink from "./NavLink";
</script>