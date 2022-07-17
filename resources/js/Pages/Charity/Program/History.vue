<template>
  <Head title="Charity Program" />
  <program-layout v-bind:program="program">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div v-for="(update,index) in updates" :key="index">
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
                    <template v-if="update.updated_at">
                      Changes on {{ program.name}} at {{moment(update.updated_at).format('MMMM Do YYYY, h:mm a')}}
                    </template>
                    <template v-if="update.created_at">
                      Original
                    </template>
                  </button>
                </h2>
                <div
                  :id="flush+[index]"
                  class="accordion-collapse collapse"
                  aria-labelledby="flush-headingOne"
                  data-bs-parent="#accordionFlushExample"
                >
                  <div class="accordion-body">

                    <p v-if="update.name"><span class="fw-bold">Program Name</span> : {{update.name}}</p>
                    <p v-if="update.description"><span class="fw-bold">Description</span> : {{update.description}}</p>
                    <p v-if="update.location"><span class="fw-bold">Location</span> : {{update.location}}</p>
                    <p v-if="update.goals">
                      <span class="fw-bold">Goals</span> 
                      <ul style="list-style-type:disc;" v-for="(goal, index) in update.goals" :key="index">
                        <li>{{ goal.name }} - {{moment(goal.date).format('MMMM Do, YYYY')}}</li>
                      </ul>
                    </p>
                    <p v-if="update.expenses">
                      <span class="fw-bold">Expenses</span> 
                      <ul style="list-style-type:disc;" v-for="(expense, index) in update.expenses" :key="index">
                        <li>{{ expense.name }} - {{ expense.amount }}</li>
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
import { computed } from 'vue';
import moment from 'moment'


let props = defineProps({
  program: Array,
  charity: Array,
});

const updates = computed(() => {
  return props.program.updates.slice().reverse();
})
</script>

