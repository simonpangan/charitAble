<template>
  <Head title="Program" />
  <charity-layout>
    <div class="tab-pane fade show active" id="type" role="tabpanel" aria-labelledby="type-tab">
        <div class="box shadow-sm border rounded bg-white mb-3">
            <div class="row p-4">
                <div v-for="program in programs" :key="program.id" class="col-md-6 mt-3">
                <Link :href="'program/' + program.id">
                        <div class="card overflow-hidden">
                            <img src="https://rimage.gnst.jp/livejapan.com/public/article/detail/a/00/04/a0004907/img/basic/a0004907_main.jpg?20210317142845&q=80&rw=750&rh=536" class="img-fluid" alt="Responsive image">
                            <div class="card-body">
                                <h5 class="card-title nmb-1">{{program.program_name}}</h5>
                                <p class="card-text text-muted ">{{program.location}}</p>
                                <p class="card-text text-success ">On-Going</p>
                                <p class="card-text text-dark">
                                  <i class="fas fa-clock"></i>
                                  {{program.created_at_formatted}}
                                </p>
                            </div>
                        </div>
                </Link>
                </div>
            </div>
      </div>
    </div>
  </charity-layout>
</template>

<script setup>
import CharityLayout from '../CharityLayout.vue';

let props = defineProps({
  programs: Array,
});

</script>
