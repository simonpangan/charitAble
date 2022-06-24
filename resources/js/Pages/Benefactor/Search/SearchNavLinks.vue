<template>
    <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
		<li class="nav-item">
			<Link 
			 	:href="$route('benefactor.charity-search.followers.index')"
				class="nav-link active"
				:class="{ 'active': $page.component === 'Benefactor/Search/Followers' }"
				>
				By Followers
			</Link>
		</li>
		<li class="nav-item">
			<Link class="nav-link">
				Location
			</Link>
		</li>
	</ul>
</template>

<script setup>

</script>