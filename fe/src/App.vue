<template>
  <TopNavbar v-model:authPopup="authPopup"/>
  <router-view/>
</template>
<script>
import TopNavbar from "@/components/nav/TopNavbar.vue";
import AuthMixin from "@/mixins/AuthMixin";

export default {
  mixins: [AuthMixin],
  components: {TopNavbar},
  data() {
    return {
      authPopup: ''
    }
  },
}
</script>

<style scoped>

</style>
