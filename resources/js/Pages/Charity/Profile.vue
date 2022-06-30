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
                                <th class="p-3">Category</th>
                                <td class="p-3">
                                    <template v-for="(category, index) in charity.categories" :key="category.id">
                                        <span v-if="index == 0">
                                            {{ category.name }}
                                        </span>
                                        <span v-else> | {{ category.name }}</span>
                                    </template>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="p-3">Permit/s</th>
                                <td class="p-3">SEC Registered Non-Profit Organization</td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="p-3">Location</th>
                                <td class="p-3">14th floor, North Tower, Rockwell Business Center Sheridan Sheridan Street, corner United St, Mandaluyong, 1550 Metro Manila </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 ">NGO Heads / Board Members</h6>
                        <Link class="btn btn-primary btn-sm" :href="$route('charity.officer.create')">
                            Add Board Member
                            <i class="fad fa-user-plus ms-1"></i>
                        </Link>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-borderless mb-0 ">
                        <tbody>
                            <div class="border-bottom" v-for="officer in charity.officers" :key="officer.id">
                                <tr class="nmb-1">
                                    <th class="p-3">Name</th>
                                    <td class="p-3">{{officer.last_name + ' ' + officer.first_name}} </td>
                                </tr>
                                <tr class="nmb-1">
                                    <th class="p-3">Position</th>
                                    <td class="p-3">{{officer.position}}</td>
                                </tr>
                                <tr class="nmb-1">
                                    <th class="p-3">Officer Since</th>
                                    <td class="p-3">{{officer.officer_since}}</td>
                                </tr>
                                    <tr class="nmb-1">
                                    <th class="p-3">Actions: </th>
                                    <td class="p-3">
                                        <Link class="btn btn-success btn-sm ">Edit</Link> 
                                        <Link 
                                            @click="officerDelete(officer.id)"
                                            as="button" 
                                            class="btn btn-danger btn-sm ms-2">
                                            Delete
                                        </Link>
                                    </td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box shadow-sm border rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Locations</h6>
                </div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card overflow-hidden">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123497.75112352976!2d120.99396112601966!3d14.695351893726098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c90bd1249c53%3A0x7f97c78e9a17f459!2sUnited%20Nations%20Children&#39;s%20Fund%20(UNICEF)!5e0!3m2!1sen!2sph!4v1655078379001!5m2!1sen!2sph&z=6"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    width="100%" height="150" frameborder="0" style="border:0;" ></iframe>
                                <div class="card-body">
                                    <h6 class="card-title">UNICEF Philippines Main Branch</h6>
                                    <p class="card-text">14th floor, North Tower, Rockwell Business Center Sheridan Sheridan Street, corner United St, Mandaluyong, 1550 Metro Manila</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </CharityLayout>
</template>

<script setup>
import CharityLayout from './CharityLayout.vue';

let props = defineProps({
    charity: Object,
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
                }));

                this.$swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    },
  },
};
</script>
