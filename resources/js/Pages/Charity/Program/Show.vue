<template>
    <Head title="Charity Program" />
    <program-layout v-bind:program="program">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Program Description</h6>
                </div>
                <div class="box-body p-3">
                    <p>
                        {{program.description}}
                    </p>
                    <div class="border-top mt-2">
                        <p class="text-strong">
                            <span class="fw-bold">Location</span> : {{ program.location }}
                        </p>
                        <p class="text-strong">
                            <span class="fw-bold">Status</span> : 
                            {{ (program.is_active) ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Program Expenses Overview</h6>
                </div>
                <div class="box-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr v-for="(expenses, index) in program.expenses" :key="index">
                                <td class="p-3"> {{expenses.name}}</td>
                                <td class="p-3"> 
                                    <span class="fa-1x">₱</span>
                                    {{expenses.amount}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Goals and Timeline</h6>
                </div>
                <div class="box-body p-3">
                    <ul class="StepProgress">
                        <li class="StepProgress-item program-is-done" v-for="(goal, index) in program.goals" :key="index">
                            <p class="text-dark"><strong>{{goal.name}}</strong></p>
                            <p> Expected Date of Completion : <b>{{moment(goal.date).format('MMMM Do, YYYY')}}</b></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </program-layout>
</template>

<script setup>
import ProgramLayout from './ProgramLayout';
import moment from 'moment'

let props = defineProps({
  program: Array,
});
</script>

