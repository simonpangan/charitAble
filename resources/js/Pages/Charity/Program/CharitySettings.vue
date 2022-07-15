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
          <h6 class="m-0">Withdraw Funds</h6>

        </div>
        <div class="box-body p-3">
        <h1>Pa move ako dito simon thank you</h1>

        </div>
      </div>

      <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3">
          <h6 class="m-0">Generate Report</h6>
        </div>
        <div class="box-body p-3">
        <h1>Pa move ako dito simon thank you</h1>

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

