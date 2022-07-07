<template>
    <Head title="Profile" />
    <CharityLayout>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">About</h6>
                </div>
                <div class="box-body p-3">
                    <p>{{charity.about}}</p>
                </div>
            </div>
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Overview</h6>
                </div>
                <div class="box-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr class="border-bottom">
                                <th class="p-3 text-center">
                                    <i class="fad fa-users-class fa-2x"></i>
                                </th>
                                <td class="p-3">
                                    <template v-for="(category, index) in charity.categories" :key="category.id">
                                        <template v-if="index == 0">
                                            {{ category.name }}
                                        </template>
                                        <template v-else> | {{ category.name }}</template>
                                    </template>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="p-3 text-center">
                                    <i class="fad fa-certificate fa-2x"></i>
                                </th>
                                <td class="p-3">
                                    {{ (charity.permits) ? charity.permits : 'Charity has no approve permit yet' }}
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="p-3 text-center">
                                    <i class="fas fa-map-marker-alt fa-2x text-danger"></i>
                                </th>
                                <td class="p-3">
                                    <a :href="'https://maps.google.com/?q=' + completeAddress"
                                        target="_blank">
                                        {{ completeAddress }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 ">NGO Heads / Board Members</h6>
                        <Link v-if="can.access" class="btn btn-primary btn-sm" :href="$route('charity.officer.create')">
                            Add Board Member
                            <i class="fad fa-user-plus ms-1"></i>
                        </Link>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-borderless mb-0 ">
                        <thead>
                            <tr class="text-center table-">
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Since</th>
                                <th scope="col" v-if="can.access">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="nmb-1 border-bottom text-center" v-for="officer in charity.officers" :key="officer.id">
                                <td class="p-3">{{officer.first_name + ' ' + officer.last_name}} </td>
                                <td class="p-3">{{officer.position}}</td>
                                <td class="p-3">{{officer.officer_since}}</td>
                                <td class="nmb-1" v-if="can.access">
                                    <Link  :href="$route('charity.officer.show', {
                                                 id: officer.id 
                                             })" 
                                        class="btn btn-success btn-sm"> 
                                            <i class="fas fa-edit"></i> 
                                        </Link>  
                                        <Link @click="officerDelete(officer.id)" 
                                        as="button"
                                        class="btn btn-danger btn-sm ms-2">
                                        <i class="fad fa-trash"></i>
                                    </Link> 
                                </td>                 
                            </tr>       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </CharityLayout>
</template>

<script setup>
import CharityLayout from './CharityLayout.vue';

let props = defineProps({
    charity: Object,
    can: Array
})
</script>

<script>
import { Inertia } from '@inertiajs/inertia'

export default {
  methods: {
    officerDelete(id) {
        this.$swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Inertia.delete(route('charity.officer.destroy', {
                    id: id 
                }), {
                    onSuccess: () => {
                         this.$swal.fire(
                            'Deleted!',
                            'Officer has been deleted.',
                            'success'
                        )
                    },
                });
            }
        })
    },
  },
  computed : {
    completeAddress() {
        const addess = this.charity.user.address;
        const city =  (this.charity.user.location.name == 'Quezon City') ? 
            'Quezon City' : 
            ''  + this.charity.user.location.name + ' City';
         return  addess.concat(', ' + city);  
    }
  }
};
</script>
