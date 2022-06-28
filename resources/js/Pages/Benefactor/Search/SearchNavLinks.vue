<template>
	<Head title="Search" />
    <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
		<li class="nav-item">
			<Link 
			 	:href="$route('benefactor.charity-search.followers')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Followers' }"
				>
				By Followers
				<i class="far fa-users"></i>
			</Link>
		</li>
		<li class="nav-item">
			<Link 
				:href="$route('benefactor.charity-search.location')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Location' }"
			>
				Location
				<i class="fad fa-location"></i>
			</Link>
		</li>
		<li class="nav-item">
			<Link 
				:href="$route('benefactor.charity-search.volunteer')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Volunteer' }"
			>
				Volunteer
				<i class="fad fa-hands-helping"></i>
			</Link>
		</li>
		<li class="nav-item">
			<Link 
				:href="$route('benefactor.charity-search.program')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Program' }"
			>
				Program
				<i class="fad fa-hand-holding-usd"></i>
			</Link>
		</li>
		<li class="nav-item ms-auto me-3">
			<input type="text" class="form-control mt-2" v-model="search" placeholder="Search" />
      	</li>
	</ul>
</template>

<script setup>
import debounce from 'lodash/debounce';
import {
    ref,
    watch,
    defineEmits
  } from 'vue';

let props = defineProps({
    search: String,
});

let search = ref(props.search);

const emit = defineEmits(['search'])

watch(search, debounce((value) => {
     emit('search', value);
}, 300));
</script>