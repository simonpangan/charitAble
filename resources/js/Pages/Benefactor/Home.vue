<template>
  <div class="py-4" role="scrollComponent">
    <div class="container">
      <div class="row position-relative">
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
          <div v-for="(post, index) in allPosts" :key="index">
            <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
              <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                <div class="dropdown-list-image me-3">
                  <!-- <img class="rounded-circle" src='http://127.0.0.1:8000/storage/charity/56/logo/unicef.png' alt=""> -->
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="fw-bold">
                  <div class="text-truncate">{{ post.charity_name }}</div>
                </div>
                <span class="ms-auto small">{{ post.created_at_formatted }}</span>
              </div>
              <div class="p-3 border-bottom osahan-post-body">
                <p class="mb-0"> {{post.main_content_body}}</p>
                <div class="div">
                  <img class="img-fluid" v-bind:src="post.main_content_body_image" alt="">
                </div>
              </div>
              <div class="p-3 border-bottom osahan-post-footer">
                <a href="#" class="me-3 text-secondary">
                  <i class="feather-heart text-danger"></i> 16 </a>
                <a href="#" class="me-3 text-secondary">
                  <i class="feather-message-square"></i> 8 </a>
                <a href="#" class="me-3 text-secondary">
                  <i class="feather-share-2"></i> 2 </a>
              </div>
            </div>
          </div>
          <div v-if="! userFollowsAtleastOneCharity">
            <div class="card p-3">
              <figure class="p-3 mb-0 text-center">
                <blockquote class="blockquote">
                  <p>Please follow atleast 1 charity.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                  charitAble
                </figcaption>
              </figure>
            </div>
          </div>
           <div v-if="userFollowsAtleastOneCharity &&
              (allPosts.length == 0)
            ">
            <div class="card p-3">
              <figure class="p-3 mb-0 text-center">
                <blockquote class="blockquote">
                  <p>Your following charity has no current post.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                  charitAble
                </figcaption>
              </figure>
            </div>
          </div>
           <div class="alert alert-dark text-center" role="alert" 
            v-if="lastPage && 
            userFollowsAtleastOneCharity &&
            (allPosts.length != 0)
            ">
            No more posts
          </div>
        </main>
        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
          <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
            <div class="py-4 px-3 border-bottom">
              <!-- <img src="img/p13.png" class="img-fluid mt-2 rounded-circle" alt="Responsive image"> -->
              <h5 class="fw-bold text-dark mb-1 mt-4">{{this.$page.props.user.email}}</h5>
            </div>
            <div class="d-flex">
              <div class="col-6 border-end p-3">
                <h6 class="fw-bold text-dark mb-1">358</h6>
                <p class="mb-0 text-black-50 small">?Number of Followed Charities</p>
              </div>
              <div class="col-6 p-3">
                <h6 class="fw-bold text-dark mb-1">85</h6>
                <p class="mb-0 text-black-50 small">Charities Donated?</p>
              </div>
            </div>
            <div class="overflow-hidden border-top">
              <a class="fw-bold p-3 d-block" href="profile.html"> View my profile </a>
            </div>
          </div>
          <div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden">
            <div class="box-title border-bottom p-3">
              <h6 class="m-0">Donated Programs</h6>
            </div>
            <div class="d-flex text-center">
              <div class="col-6 border-end py-4 px-2">
                <h5 class="fw-bold text-info mb-1">08 <i class="feather-bar-chart-2"></i>
                </h5>
                <p class="mb-0 text-black-50 small">last 5 days</p>
              </div>
              <div class="col-6 py-4 px-2">
                <h5 class="fw-bold text-success mb-1">+ 43% <i class="feather-bar-chart"></i>
                </h5>
                <p class="mb-0 text-black-50 small">Since last week</p>
              </div>
            </div>
            <div class="overflow-hidden border-top text-center">
              <img src="img/chart.png" class="img-fluid" alt="Responsive image">
            </div>
          </div>
          <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
            <img src="img/job1.png" class="img-fluid" alt="Responsive image">
            <div class="p-3 border-bottom">
              <h6 class="fw-bold text-dark">Osahan Solutions</h6>
              <p class="mb-0 text-muted">Looking for talent?</p>
            </div>
            <div class="p-3">
              <button type="button" class="btn btn-outline-primary ps-4 pe-4"> POST A JOB </button>
            </div>
          </div>
        </aside>
        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
          <div class="box shadow-sm border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
              <h6 class="m-0">Charities You Might Like</h6>
            </div>
            <div class="box-body p-3">
              <div v-for="charity in randomCharity" :key="charity.id"
                class="d-flex align-items-center osahan-post-header mb-3 people-list">
                <div class="dropdown-list-image me-3">
                  <img class="rounded-circle" src="img/p8.png" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="fw-bold me-2">
                  <div class="text-truncate"> {{ charity.name }} </div>
                </div>
                <span class="ms-auto">
                  <Link :href="$route('benefactor.connections.store')" 
                      :data="{ id: charity.id }"
                      method="post" as="button" type="button"
                      class="btn btn-light btn-sm text-nowrap">
                  <i class="feather-plus"></i>  
                      Follow
                  </Link>
                </span>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center" v-if="loading">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <span ref="loadMorePosts" />
</template>

<script>
  export default {
    props: {
        posts: Array,
        user: Array,
        volunteer_post: Array,
        randomCharity: Array,
        userFollowsAtleastOneCharity: Boolean
    },
   data() {
        return {
          allPosts: this.posts.data,
          initialUrl: this.$page.url, 
          lastPage: false,
          loading: false,
        }
    },
    methods: {
      loadMorePosts() {
        if (this.posts.next_page_url === null) {
            this.lastPage = true;
            return
        }
    
        this.$inertia.get(this.posts.next_page_url, {}, {
            preserveState: true,
            preserveScroll: true,
            only: ['posts'],  
            onStart: visit => {
                this.loading = true
            },
            onSuccess: () => {
                this.allPosts = [...this.allPosts, ...this.posts.data],
                window.history.replaceState({}, this.$page.title, this.initialUrl),
                this.loading = false
            }
        })
      }
    },
    mounted() {
      const observer = new IntersectionObserver(entries => entries.forEach(
            entry => entry.isIntersecting && this.loadMorePosts(), {
        rootMargin: "-150px 0px 0px 0px"
      }));

      observer.observe(this.$refs.loadMorePosts)
    }
  }
</script>