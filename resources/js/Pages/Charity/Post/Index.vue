<template>
    <Head title="Post" />
    <CharityLayout>
        <div class="tab-pane fade show active">
            <div v-for="post in posts" :key="post.id">
                <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
                    <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                        <!-- <div class="dropdown-list-image me-3">
                            <img class="rounded-circle" v-bind:src="this.$page.props.user.charity.logo" alt="">
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">{{this.$page.props.user.charity.name}}<span class="text-info ms-1"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Verified" class="feather-check-circle"></i></span></div>
                            <div class="small text-gray-500">June 13, 2022</div>
                        </div> -->
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
                    <div class="p-3 border-bottom osahan-post-footer">
                        <a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
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
});

</script>
