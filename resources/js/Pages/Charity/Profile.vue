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
                            <tr class="border-bottom" v-if="charity.website_link">
                                <th class="p-3">Website</th>
                                <td class="p-3">
                                    <a :href="charity.website_link" class="text-dark" target="_blank">
                                        {{ charity.website_link }}
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-bottom" v-if="charity.facebook_link">
                                <th class="p-3">Facebook</th>
                                <td class="p-3">
                                      <a :href="charity.facebook_link" class="text-dark" target="_blank">
                                        {{ charity.facebook_link }}
                                    </a>
                                </td>
                            </tr>
                             <tr class="border-bottom" v-if="charity.twitter_link">
                                <th class="p-3">Twitter</th>
                                <td class="p-3">
                                    <a :href="charity.twitter_link" class="text-dark" target="_blank">
                                        {{ charity.twitter_link }}
                                    </a>
                                </td>
                            </tr>
                             <tr class="border-bottom" v-if="charity.instagram_link">
                                <th class="p-3">Instagram</th>
                                <td class="p-3">
                                    <a :href="charity.instagram_link" class="text-dark" target="_blank">
                                        {{ charity.instagram_link }}
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
                        <tbody>
                            <div class="border-bottom" v-for="officer in charity.officers" :key="officer.id">
                                <tr class="nmb-1">
                                    <th class="p-3">Name</th>
                                    <td class="p-3">{{officer.first_name + ' ' + officer.last_name}} </td>
                                </tr>
                                <tr class="nmb-1">
                                    <th class="p-3">Position</th>
                                    <td class="p-3">{{officer.position}}</td>
                                </tr>
                                <tr class="nmb-1">
                                    <th class="p-3">Officer Since</th>
                                    <td class="p-3">{{officer.officer_since}}</td>
                                </tr>
                                <tr class="nmb-1" v-if="can.access">
                                    <th class="p-3">Actions: </th>
                                    <td class="p-3">
                                        <Link 
                                            :href="$route('charity.officer.show', {
                                                id: officer.id
                                            })"
                                            class="btn btn-success btn-sm"
                                        >Edit</Link> 
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
                            'Your file has been deleted.',
                            'success'
                        )
                    },
                });
            }
        })
    },
  },
};
</script>
