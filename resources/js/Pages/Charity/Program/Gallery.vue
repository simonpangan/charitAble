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
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/pWkk7iiCoDM/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/aob0ukAYfuI/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/EUfxH-pze7s/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/M185_qYH8vg/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/sesveuG_rNo/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-6x col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/AvhMzHwiE_0/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/2gYsZUmockw/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/EMSDtjVHdQ8/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/8mUEy0ABdNE/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/G9Rfc1qccH4/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/aJeH0KcFkuc/400x300"
                    alt=""
                  />
                </a>
              </div>
              <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img
                    class="img-fluid img-thumbnail"
                    src="https://source.unsplash.com/p2TQ-3Bh3Oo/400x300"
                    alt=""
                  />
                </a>
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
});
</script>

