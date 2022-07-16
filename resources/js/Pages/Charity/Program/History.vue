<template>
  <Head title="Charity Program" />
  <program-layout v-bind:program="program">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div v-for="(updates,index) in program.updates" :key="index">
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
                Changes on {{ program.name}} at {{updates.updated_at_formatted}}
                  </button>
                </h2>
                <div
                  :id="flush+[index]"
                  class="accordion-collapse collapse"
                  aria-labelledby="flush-headingOne"
                  data-bs-parent="#accordionFlushExample"
                >
                  <div class="accordion-body">

                    <p v-if="updates.name"><span class="fw-bold">Program Name</span> : {{updates.name}}</p>
                    <p v-if="updates.description"><span class="fw-bold">Description</span> : {{updates.description}}</p>
                    <p v-if="updates.location"><span class="fw-bold">Location</span> : {{updates.location}}</p>
                    <p v-if="updates.goals">
                      <span class="fw-bold">Goals</span> 

                      <ul style="list-style-type:disc;" v-for="(goal, index) in updates.goals" :key="index">
                        <li>{{ goal.name }}</li>
                      </ul>
                    </p>
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

