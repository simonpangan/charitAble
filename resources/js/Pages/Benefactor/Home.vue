<template>
  <Head title="Home" />
    
  <div class="py-4" role="scrollComponent">
    <div class="container">
      <div class="row position-relative">
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
          <div v-for="(post, index) in allPosts" :key="index">
            <div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
              <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                <Link :href="$route('charity.profile.index', {
                  'id' : post.charity_id
                })">
                  <div class="dropdown-list-image me-3 d-inline">
                    <img class="rounded-circle" 
                      :src="post.charity_logo"
                      alt="charity logo"
                    >
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="fw-bold text-truncate text-black d-inline">
                    {{ post.charity_name }}
                  </div>
                </Link>
                <span class="ms-auto small">{{ post.created_at_formatted }}</span>
              </div>
              <div class="p-3 border-bottom osahan-post-body">
                <p class="mb-0"> {{post.main_content_body}}</p>
                <div class="div mt-2" v-if="post.main_content_body_image">
                  <img class="img-fluid" v-bind:src="post.main_content_body_image" alt="post image">
                </div>
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
            v-if="(posts.next_page_url === null) && 
            userFollowsAtleastOneCharity &&
            (allPosts.length != 0)
            ">
            No more posts
          </div>
        </main>
        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
        <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center sticky-md-top">
          <div class="py-4 px-3 border-bottom">
            <h5 class="font-weight-bold text-dark mb-1 mt-4">
              {{ benefactor.first_name + " "  + benefactor.last_name }}
            </h5>
          </div>
          <div class="d-flex">
            <div class="col-6 border-right p-3">
              <h6 class="font-weight-bold text-dark mb-1">{{ userFollowingCount }}</h6>
              <p class="mb-0 text-black-50 small">Connections</p>
            </div>
            <div class="col-6 p-3">
              <h6 class="font-weight-bold text-dark mb-1"> ₱ {{ totalDonation.toFixed(2) }}</h6>
              <p class="mb-0 text-black-50 small">Donations</p>
            </div>
          </div>
        </div>
       </aside>
        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
          <div class="box shadow-sm border rounded bg-white mb-3 sticky-md-top z-0">
            <div class="box-title bo    rder-bottom p-3">
              <h6 class="m-0">Charities You Might Like</h6>
            </div>
            <div class="box-body p-3">
              <div v-for="charity in randomCharity" :key="charity.id"
                class="d-flex align-items-center osahan-post-header mb-3 people-list">
                <Link :href="$route('charity.profile.index', {
                  'id' : charity.id
                })" class="position-relative">
                  <div class="dropdown-list-image me-3 d-inline">
                    <img class="rounded-circle" 
                      :src="charity.logo"
                      alt="charity logo"
                    >
                  </div>
                  <div class="fw-bold text-black d-inline-block align-middle">
                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                      {{ charity.name }}
                    </span>
                  </div>
                </Link>
                <span class="ms-auto">
                  <button  @click="followCharity(charity.id)" class="btn btn-light btn-sm text-nowrap position-relative">
                    <i class="feather-plus"></i>  
                        Follow
                  </button>
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
import { integer } from '@vuelidate/validators';
  export default {
    props: {
        posts: Array,
        benefactor: Array,
        volunteer_post: Array,
        randomCharity: Array,
        userFollowsAtleastOneCharity: Boolean,
        userFollowingCount: Number,
        totalDonation: Number,
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
      },
      followCharity($id) {
        this.$inertia.post(route('benefactor.connections.charities.store'), {
          id: $id
        }, {
            onSuccess: () => {
              this.$inertia.get(route('benefactor.home.index'));
            }
        });
      }
    },
    mounted() {
      const observer = new IntersectionObserver(entries => entries.forEach(
            entry => entry.isIntersecting && this.loadMorePosts(), {
        rootMargin: "-150px 0px 0px 0px"
      }));

      observer.observe(this.$refs.loadMorePosts)
    },
  }
</script>