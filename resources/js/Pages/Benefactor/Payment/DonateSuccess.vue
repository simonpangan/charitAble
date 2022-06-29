<template>
  <div class="container">
    <div class="row justify-content-center align-items-center d-flex h-75">
      <div class="col-md-6">
          <i class="feather-arrow-left me-2 "></i
                            ><Link href="profile" class="fw-bold text-muted ">Return to Profile</Link>
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

export default {
  components: {

  },
  setup() {

  },
  props: {
  },
  data() {},
  methods: {

  },
};
</script>
