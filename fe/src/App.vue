<template>
  <TopNavbar v-model:authPopup="authPopup"/>
  <router-view/>
</template>
<script>
import TopNavbar from "@/components/nav/TopNavbar.vue";

export default {
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
