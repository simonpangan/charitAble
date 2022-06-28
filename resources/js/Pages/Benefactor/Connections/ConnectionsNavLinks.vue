<template>
  <Head title="Connections" />
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
        <Link class="nav-link" id="home-tab" 
          :href="$route('benefactor.connections.program.index')"
          :class="{ 'active': $page.component === 'Benefactor/Connections/Program' }"
        > 
          Program
        </Link>
      </li>
      <li class="nav-item ms-auto me-3">
        <input type="text" class="form-control mt-2" v-model="search" placeholder="Search" />
      </li>
    </ul>
  </div>
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