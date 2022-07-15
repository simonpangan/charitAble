<template>
  <Head title="Charity Program" />
  <program-layout v-bind:program="program">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3">
          <h6 class="m-0">Lists of Photos</h6>
        </div>
        <div class="box-body p-3">
          <!-- Page Content -->
          <div class="container">
            <div class="row text-center text-lg-start">
              <div class="col-lg-6 col-md-6 col-6">
                  <img
                    class="img-fluid img-thumbnail"
                    v-bind:src="this.program.header"
                    alt=""
                  />
              </div>

              <div class="col-lg-6 col-md-6 col-6" v-for="(posts) in posts" :key="posts.id">
                  <img
                    class="img-fluid img-thumbnail"
                    v-bind:src="posts.main_content_body_image"
                    alt=""
                  />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </program-layout>
</template>

<script setup>
import ProgramLayout from "./ProgramLayout";

let props = defineProps({
  program: Array,
  posts: Array,
});
</script>

