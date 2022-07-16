<template>
  <Head title="Charity Program" />
  <program-layout v-bind:program="program">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div v-for="post in posts" :key="post.id">
        <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
          <div
            class="
              p-3
              d-flex
              align-items-center
              border-bottom
              osahan-post-header
            "
          >
            <div class="dropdown-list-image me-3">
              <img class="rounded-circle" v-bind:src="charity[0].logo" alt="" />
            </div>
            <div class="font-weight-bold">
              <div class="text-truncate">
                {{ charity[0].name
                }}<span class="text-info ms-1"
                  ><i
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Verified"
                    class="feather-check-circle"
                  ></i
                ></span>
              </div>
              <div class="small text-gray-500">
                {{ post.created_at_formatted }}
              </div>
            </div>
            <span class="ms-auto small"></span>
          </div>
          <div class="p-3 border-bottom osahan-post-body">
            {{ post.main_content_body }}
            <img
              v-if="post.main_content_body_image"
              v-bind:src="post.main_content_body_image"
              class="img-fluid"
              alt="post image"
            />
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
  posts: Array,
  charity: Array,
});
</script>

