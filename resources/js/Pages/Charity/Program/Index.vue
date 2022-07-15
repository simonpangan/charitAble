<template>
  <Head title="Program" />
  <charity-layout>
    <div class="tab-pane fade show active" id="type" role="tabpanel" aria-labelledby="type-tab">
        <div class="box shadow-sm border rounded bg-white mb-3">
          <div class="row p-4">
            <template v-if="programs.data.length > 0">
              <div v-for="program in programs.data" :key="program.id" class="col-md-6 mt-3">
                <Link :href="$route('charity.program.show', {
                  'id': program.id
                })">
                  <div class="card overflow-hidden">
                      <img v-if="program.header" :src="program.header" class="img-fluid" alt="Responsive image" style="max-height:200px;">
                      <div class="card-body">
                          <h5 class="card-title nmb-1">{{program.name}}</h5>
                          <p class="card-text text-muted text-truncate">{{program.description}}</p>
                          <p class="card-text text-dark">
                            <i class="fas fa-clock"></i>
                            {{program.created_at_formatted}}
                          </p>
                      </div>
                  </div>
                </Link>
              </div>
            </template>
             <div v-else>
              <figure class="mb-0 text-center">
                  <blockquote class="blockquote">
                      <p>The charity has no current program.</p>
                  </blockquote>
              </figure>
            </div>
          </div>
          <nav v-if="programs.data.length > 0">
            <ul class="pagination justify-content-center">
              <li  v-for="(link, index) in programs.links" :key="index"
                class="page-item"
                :class="[
                    link.active ? 'active' : '',
                    link.url ? 'pager' : '',
                ]"
              >
                <Component 
                  :is="link.url ? 'Link' : 'span'"
                  v-if="link.url" 
                  :href="link.url" 
                  v-html="link.label"
                  class="page-link"
                >
                </Component>
              </li>
            </ul>
          </nav>
      </div>
    </div>
  </charity-layout>
</template>

<script setup>
import CharityLayout from '../CharityLayout.vue';

let props = defineProps({
  programs: Object,
});

</script>
