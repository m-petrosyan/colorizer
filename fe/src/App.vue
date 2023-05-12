<template>
  <TopNavbar/>
  <router-view/>
</template>
<script>
import TopNavbar from "@/components/nav/TopNavbar.vue";

export default {
  components: {TopNavbar}
}
</script>

<style scoped>

</style>
