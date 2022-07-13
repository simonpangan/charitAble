<template>
  <Head title="Create Post"></Head>
  <div class="container mt-4">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-md-6">
        <Link class="fw-bold text-muted" v-on:click="goBack">
          <i class="far fa-arrow-left me-2"></i>
          Go Back
        </Link>
        <form @submit.prevent="submit">
          <div class="box shadow-sm border rounded bg-white mb-3 mt-3 osahan-post">
            <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
              <div class="me-3">
                <h6>Create Post</h6>
              </div>
            </div>
            <div class="p-3 border-bottom osahan-post-body">
              <div class="w-100">
                <textarea placeholder="Write a message…" v-model="form.main_content_body" class="form-control border-0 p-3 shadow-none" rows="7">
                </textarea>
                <div class="float-end">{{ charactersLength }} / 63000 characters</div>
                <span v-if="form.errors.main_content_body" v-text="form.errors.main_content_body"
                    class="invalid-feedback d-block" role="alert">
                </span>
              </div>
              <br />
              <file-pond
                name="main_content_body_image"
                class="h-25 mt-4 mb-2"
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
                  },
                }"
                allow-multiple="false"
                accepted-file-types="image/jpeg, image/png"
                max-files="1"
                allowDrop="true"
                dropOnPage="true"
                maxFileSize= "5MB"
                labelIdle="Click Here To Upload File"
                v-on:init="handleFilePondInit"
                v-on:updatefiles="handleFilePondUpdateFiles"
                v-on:removefile="handleRevertFilePond"
                v-on:addfilestart="OnhandleOnAddFileStart"
                v-on:processfile="onHandleaddfile"
              ></file-pond>
              <span v-if="form.errors.main_content_body_image" v-text="form.errors.main_content_body_image"
                  class="invalid-feedback d-block" role="alert">
              </span>
            </div>
            <div class="p-3 border-bottom osahan-post-footer">
              <div class="p-3 d-flex">
                <span class="mx-auto">
                  <button :disabled="this.LoadingState == 'false' " type="submit" class="btn btn-primary btn-lg rounded">
                    Post
                    <i class="fad fa-share ms-1"></i>
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
import { reactive,computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import vueFilePond from "vue-filepond";
// Import FilePond styles
import axios from "axios";

import "filepond/dist/filepond.min.css";
// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

import { useForm } from "@inertiajs/inertia-vue3";

// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview,FilePondPluginFileValidateSize
);

export default {
  components: {
    FilePond,
  },
  setup() {
    let form = useForm({
      main_content_body: '',
      main_content_body_image: null,
    });

    let submit = () => {
      form.post(route("charity.post.store"));
    };

    return { form, submit };
  },
  props: {
    csrfToken: String,
  },
  data() {
    return{
    lastFileName : '',
    LoadingState : 'true'
    }
  },
  methods: {
    goBack() {
      return window.history.back();
    },
    handleFilePondInit: function () {
      console.log("FilePond has initialized");s
      // FilePond instance methods are available on `this.$refs.pond`
    },
    handleFilePondUpdateFiles: function (main_content_body_image) {
      this.form.main_content_body_image = main_content_body_image.map(
        (main_content_body_image) => main_content_body_image.file
      );
      this.lastFileName = this.form.main_content_body_image;
    },
    handleRevertFilePond: function (main_content_body_image) {
      return axios({
        method: "POST",
        url: "/charity/uploadPostPhoto/revert",
        data: {
          filename : this.lastFileName[0].name
        },
      }).then((response) => {
       alert
      });
    },
    OnhandleOnAddFileStart: function(){
        this.LoadingState = 'false';
    },
    onHandleaddfile:function(){
        this.LoadingState = 'true';
    },
  },
  computed : {
    charactersLength() {
      return this.form.main_content_body.length;
    }
  }
};
</script>
<style>
@import "filepond/dist/filepond.css";

.filepond--wrapper {
  height: 150px;
}

.filepond--drop-label {
    background-color:white;
    border-radius: 25px;
    border: 2px solid #007bff;
    padding: 20px;
}
@import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
</style>
