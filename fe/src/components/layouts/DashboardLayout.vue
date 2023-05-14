<template>
  <section class="flex">
    <DashboardNavbar/>
    <router-view/>
  </section>
</template>

<script>
import DashboardNavbar from "@/components/nav/DashboardNavbar.vue";

export default {
  name: "DashboardLayout",
  components: {DashboardNavbar}
}
</script>

<style scoped>

</style>