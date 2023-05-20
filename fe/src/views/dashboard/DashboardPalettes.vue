<template>
  <div>
    <h1 class="text-big bold">Trending Color Palettes</h1>
    <PaletteItems v-if="palettes" :palettes="palettes" :title="true" :cols="4"/>
  </div>
</template>

<script>
import PaletteItems from "@/components/palette/PaletteItems.vue";

export default {
  name: "DashboardPalettes",
  components: {PaletteItems},
  mounted() {
    this.$store.dispatch('getUserPalettes')
  },
  computed: {
    user() {
      return this.$store.getters.getAuth
    },
    palettes() {
      return this.$store.getters.getPalettes
    }
  }
}
</script>

<style scoped>

</style>