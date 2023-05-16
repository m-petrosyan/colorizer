<template>
  <section class="flex gap-x-10 py-5 h-full-content">
    <DashboardNavbar class="w-fit"/>
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