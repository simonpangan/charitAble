<template>
	<li class="nav-item">
		<NavLink class="nav-link btn btn-link" href="/benefactor/home">
			<i class="fas fa-home-alt me-1"></i>
			<span class="d-none d-lg-inline">Home</span>
		</NavLink>
		</li>
		<li class="nav-item">
		<NavLink class="nav-link btn btn-link" href="/benefactor/charity-search/followers">
			<i class="fas fa-hand-holding-heart me-1"></i>
			<span class="d-none d-lg-inline">Charities</span>
		</NavLink>
		</li>
		<li class="nav-item dropdown no-arrow ms-1 osahan-profile-dropdown">
		<a class="nav-link dropdown-toggle pe-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-bars fa-lg"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-end shadow-sm">
			<NavLink class="dropdown-item btn btn-link" href="/benefactor/profile">
				<i class="far fa-user me-1"></i>
				My Account
			</NavLink>
			<NavLink class="dropdown-item btn btn-link" href="/benefactor/dashboard">
				<i class="far fa-chart-line me-1"></i>
				Dashboard
			</NavLink>
			<NavLink class="dropdown-item btn btn-link" href="/benefactor/connections-charities">
				<i class="far fa-user-friends me-1"></i>
				Connections
			</NavLink>
			<NavLink class="dropdown-item btn btn-link" href="/benefactor/logs">
				<i class="far fa-receipt me-1"></i>
				Logs
			</NavLink>
			<div class="dropdown-divider"></div>
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