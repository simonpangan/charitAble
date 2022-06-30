<template>
    <Head title="Post" />
    <CharityLayout>
        <div class="tab-pane fade show active">
            <div v-for="post in posts" :key="post.id">
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
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fal fa-ellipsis-v-alt"></i>
                    </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
                    </div>
                    <div class="p-3 border-bottom osahan-post-body">
                        {{post.main_content_body}}
                        <div class="div">
                        <img class="img-fluid" v-bind:src="post.main_content_body_image" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </CharityLayout>
</template>

<script setup>
import CharityLayout from '../CharityLayout.vue';

let props = defineProps({
    posts: Array,
    charity: Object
});

</script>
