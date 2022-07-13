<template>
    <Head title="Post" />
    <CharityLayout>
        <div class="tab-pane fade show active">
            <template v-if="posts.length > 0">
                <div  v-for="post in posts" :key="post.id">
                    <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
                        <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                            <div class="dropdown-list-image me-3">
                                <img class="rounded-circle" v-bind:src="charity.logo" alt="">
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">{{charity.name}}<span class="text-info ms-1"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Verified" class="feather-check-circle"></i></span></div>
                                <div class="small text-gray-500"> {{post.created_at_formatted}}</div>
                            </div>
                            <span class="ms-auto small"></span>
                            <button v-if="can.access" class="btn btn-danger" @click="deletePost(post.id)">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                        <div class="p-3 border-bottom osahan-post-body">
                            <p class="text-break">
                                {{post.main_content_body}}
                            </p>
                            <div v-if="post.main_content_body_image" class="text-center">
                                <img  v-bind:src="post.main_content_body_image" class="img-fluid"  alt="post image">
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <div v-else>
                <div class="card p-3">
                    <figure class="mb-0 text-center">
                        <blockquote class="blockquote">
                            <p>The charity has no current post.</p>
                        </blockquote>
                    </figure>
                </div>
            </div>
        </div>
   </CharityLayout>
</template>

<script setup>
import CharityLayout from '../CharityLayout.vue';

let props = defineProps({
    posts: Array,
    charity: Object,
    can: Array
});

</script>


<script>
import { Inertia } from '@inertiajs/inertia'

export default {
  methods: {
    deletePost(id) {
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
                Inertia.delete(route('charity.post.destroy', {
                    id: id 
                }), {
                    onSuccess: () => {
                         this.$swal.fire(
                            'Deleted!',
                            'Your post has been deleted.',
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

