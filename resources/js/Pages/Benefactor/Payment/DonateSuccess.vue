<template>
  <div class="container h-100">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-md-6 mx-auto">
        <div
          class=" box shadow-sm border rounded bg-white mt-auto osahan-post alert alert-success">
          <div class="p-3 d-flex align-items-center osahan-post-header">
            <div class="me-3 align-items-center">
              <i class="fad fa-heart fa-9x"></i>
            </div>
          </div>

          <div class="p-3 osahan-post-body">
            <div class="w-100">
              <h1>Thank you for contributing.</h1>
              <p> - {{program.charity.name}}</p>
              <p class="nmb-1">Transaction receipt: 
                <a :href="etherscanLink" target="_blank">
                  {{transaction}}
                </a>
              </p>
              <br />
              <Link  type="button" :href="$route('charity.program.supporters',{
                id: program.id
              })"
                class="btn btn-primary btn-block text-uppercase w-100">
                  Finish
                  <i class="fal fa-sign-in"></i>
              </Link>
            </div>
          </div>
          <div class="border-top osahan-post-footer">
            <div class="d-flex">
              <span class="">
                  <i class="fab fa-twitter me-3"></i>
                <a
                  target="_blank"
                  :href="'https://twitter.com/intent/tweet?text=' + message" 
                  class="twitter-share-button"
                  data-show-count="false"
                  >Share this donation to Twitter</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    program: Object,
    transaction: String,
  },
  computed: {
    etherscanLink() {
      return 'https://rinkeby.etherscan.io/tx/' + this.transaction;
    },
    message() {
      return 'I have donated to ' + this.program.name + " . A program by " + this.program.charity.name 
      + ' . Here\'s my transaction receipt : ' + this.etherscanLink ;
    }
  }
};
</script>
