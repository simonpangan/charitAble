<template>
    <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
		<li class="nav-item">
			<Link 
			 	:href="$route('benefactor.charity-search.followers')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Followers' }"
				>
				By Followers
			</Link>
		</li>
		<li class="nav-item">
			<Link 
				:href="$route('benefactor.charity-search.location')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Location' }"
			>
				Location
			</Link>
		</li>
		<li class="nav-item">
			<Link 
				:href="$route('benefactor.charity-search.program')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Program' }"
			>
				Program
			</Link>
		</li>
			<li class="nav-item">
			<Link 
				:href="$route('benefactor.charity-search.volunteer')"
				class="nav-link"
				:class="{ 'active': $page.component === 'Benefactor/Search/Volunteer' }"
			>
				Volunteer
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