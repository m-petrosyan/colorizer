<template>
  <section>
    <TopPalettes count="24" :filters="true"/>
  </section>
</template>

<script>
import TopPalettes from "@/components/palettes/TopPalettes.vue";

export default {
  name: "ExploreHex",
  components: {TopPalettes},
  data() {
    return {}
  }
}
</script>

<style scoped>

</style>