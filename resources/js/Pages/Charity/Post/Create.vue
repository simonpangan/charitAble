<template>
  <Head title="Create Post"></Head>
  <div class="container mt-4">
    <div class="row justify-content-center align-items-center d-flex h-75">
      <div class="col-md-6">
        <Link class="fw-bold text-muted" v-on:click="goBack">
          <i class="far fa-arrow-left me-2"></i>
          Go Back
        </Link>
        <form @submit.prevent="submit">
        <div class="box shadow-sm border rounded bg-white mb-3 mt-3 osahan-post">
          <div
            class="
              p-3
              d-flex
              align-items-center
              border-bottom
              osahan-post-header
            "
          >
            <div class="me-3">
              <h6>Create Post</h6>
            </div>
          </div>
          <div class="p-3 border-bottom osahan-post-body">
            <div class="w-100">
              <textarea
                placeholder="Write a message…"
                v-model="form.main_content_body"
                class="form-control border-0 p-3 shadow-none"
                rows="7"
              ></textarea>
            </div>

            <file-pond
              name="main_content_body_image"
              class="h-50 mt-4 mb-2"
              v-model="main_content_body_image"
              credits="false"
              ref="main_content_body_image"
              v-bind:files="main_content_body_image"
              v-bind:server="{
                timeout: 7000,
                url: '/charity/uploadPostPhoto',
                process: {
                  headers: {
                    url: '/charity/uploadPostPhoto',
                    method: 'POST',
                    'X-CSRF-TOKEN': this.$page.props.csrfToken,
                  },
                  withCredentials: false,
                },
              }"
              allow-multiple="false"
              accepted-file-types="image/jpeg, image/png"
              max-files="1"
              allowDrop="true"
              dropOnPage="true"
              v-on:init="handleFilePondInit"
              v-on:updatefiles="handleFilePondUpdateFiles"
            ></file-pond>
          </div>
          <div class="p-3 border-bottom osahan-post-footer">
            <div class="p-3 d-flex">
              <span class="mx-auto">
                <button :disabled="form.processing"  type="submit" class="btn btn-primary btn-sm rounded">
                  <i class="feather-send"></i> Send
                </button>
              </span>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import vueFilePond from "vue-filepond";
// Import FilePond styles
import "filepond/dist/filepond.min.css";
// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import { useForm } from "@inertiajs/inertia-vue3"

// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

export default {
  components: {
    FilePond,
  },
  setup() {
    let form = useForm({
    main_content_body: null,
    main_content_body_image: null,
})

    let submit = () => {
        form.post(route('charity.post.store'));
    }

    return { form,submit}
  },
  props: {
    csrfToken: String,
  },
  data() {},
  methods: {
    goBack() {
      return window.history.back();
    },
    handleFilePondInit: function () {
      console.log("FilePond has initialized");
      // FilePond instance methods are available on `this.$refs.pond`
    },
    handleFilePondUpdateFiles:function(main_content_body_image){
        this.form.main_content_body_image = main_content_body_image.map(main_content_body_image => main_content_body_image.file);
    },
  },
};
</script>
<style>
@import "filepond/dist/filepond.css";

.filepond--wrapper {
  max-height: 120px;
}

.filepond--drop-label {
  background-color: white;
  border-radius: 25px;
  border: 0.5px solid #e1d9d1;
  padding: 20px;
}
@import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
</style>
