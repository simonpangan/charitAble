<template>
	<li class="nav-item">
	<NavLink class="nav-link btn btn-link" href="/admin/home">
		<span class="d-none d-lg-inline">Charities</span>
	</NavLink>
	</li>
	<li class="nav-item">
	<NavLink class="nav-link btn btn-link" href="/benefactor/charity-search/followers">
		<span class="d-none d-lg-inline">Withdrawal</span>
	</NavLink>
	</li>
	<li class="nav-item">
	<NavLink class="nav-link btn btn-link" href="/logout" method="post" as="button">
		Logout
		<i class="fad fa-sign-out ms-1"></i>
	</NavLink>
	</li>
</template>

<script setup>
import NavLink from "./NavLink";
</script>