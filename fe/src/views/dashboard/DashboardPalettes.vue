<template>
  <div>
    <h1 class="text-big bold">Trending Color Palettes</h1>
    <PaletteItems v-if="user?.palettes " :palettes="user?.palettes" :title="true"/>
  </div>
</template>

<script>
import PaletteItems from "@/components/palette/PaletteItems.vue";

export default {
  name: "DashboardPalettes",
  components: {PaletteItems},
  computed: {
    user() {
      return this.$store.getters.getAuth
    }
  }
}
</script>

<style scoped>

</style>