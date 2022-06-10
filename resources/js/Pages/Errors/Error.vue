<template>
  <div>
    <Forbidden v-if="status === 403" />
    <NotFound v-else-if="status === 404" />
    <Maintenance v-else-if="status === 503" />
  </div>
</template>

<script>
import Forbidden from "./Forbidden.vue";
import Maintenance from "./Maintenance.vue";
import NotFound from "./NotFound.vue";

export default {
  props: {
    status: Number,
  },
  components: {
    Forbidden,
    Maintenance,
    NotFound,
  },
};
</script>