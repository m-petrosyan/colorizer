<template>
  <TopNavbar/>
  <router-view/>
</template>
<script>
import TopNavbar from "@/components/TopNavbar.vue";

export default {
  mounted() {
    console.log(this.$store.getters.getTask)
  },
  components: {TopNavbar}
}
</script>

<style scoped>

</style>
