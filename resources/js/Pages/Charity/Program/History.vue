<template>
  <Head title="Charity Program" />
  <program-layout v-bind:program="program">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div v-for="(updates,index) in program.updates" :key="program.id">
        <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
          <div class="p-3 border-bottom osahan-post-body">
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    :data-bs-target="'#'+flush+[index]"
                    aria-expanded="false"
                    aria-controls="flush-collapseOne"
                  >
                Changes on {{ program.name}} at {{program.updates[index].updated_at_formatted}}
                  </button>
                </h2>
                <div
                  :id="flush+[index]"
                  class="accordion-collapse collapse"
                  aria-labelledby="flush-headingOne"
                  data-bs-parent="#accordionFlushExample"
                >
                  <div class="accordion-body">

                    <p v-if="program.updates[index].name">Program Name : {{program.updates[index].name}}</p>
                    <p v-if="program.updates[index].description">Description : {{program.updates[index].description}}</p>
                    <p v-if="program.updates[index].location">Location : {{program.updates[index].location}}</p>
                    
                    
                     
                  
             
                  </div>
                </div>
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
  charity: Array,
});
</script>

