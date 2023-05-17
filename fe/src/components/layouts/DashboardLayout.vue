<template>
  <section class="flex py-5 gap-x-2 h-full-content">
    <DashboardNavbar class="w-fit"/>
    <router-view class="w-full px-5"/>
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