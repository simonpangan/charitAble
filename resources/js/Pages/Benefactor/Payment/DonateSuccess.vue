<template>
  <div class="container h-100">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-md-6 mx-auto">
        <form @submit.prevent="submit">
          <div
            class="
              box
              shadow-sm
              border
              rounded
              bg-white
              mt-auto
              osahan-post
              alert alert-success
            "
          >
            <div class="p-3 d-flex align-items-center osahan-post-header">
              <div class="me-3 align-items-center">
                <i class="fad fa-heart fa-9x"></i>
              </div>
            </div>

            <div class="p-3 osahan-post-body">
              <div class="w-100">
                <h1>Thank you for contributing.</h1>
               <p>{{this.$page.props.program.program_name}} by {{this.$page.props.charity[0].name}}</p>
                <p class="nmb-1">Transaction id: {{this.$page.props.transaction[0].transaction_id}}</p>
              <p ><small>You can check the transaction details through our blockchain transparency program</small></p>


                <div class="d-flex">
                  <span class="mx-auto pt-5">
                    <Link  type="button" :href="$route('charity.program.show',{id:4})"
                                class="btn btn-primary btn-block text-uppercase w-100">
                            Finish
                            <i class="fal fa-sign-in"></i>
                        </Link>
                  </span>
                </div>

              </div>
            </div>
            <div class="border-top osahan-post-footer">
              <div class="d-flex">
                <span class="">
                    <i class="fab fa-twitter me-3"></i>
                  <a
                    href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                    class="twitter-share-button"
                    data-show-count="false"
                    >Share this donation to Twitter</a>
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
  components: {},
  setup() {},
  props: {
    charity:Array,
    program: Object
  },
  data() {},
  methods: {},
};
</script>
