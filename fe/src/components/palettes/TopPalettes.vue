<template>
  <section class="resize">
    <div class="text-center">
      <h1 class="extra-title">Trending Color Palettes</h1>
      <p class="text grey">Get inspired by thousands of beautiful color schemes and make something cool!</p>
    </div>
    <div class="filters" v-if="filters">
      <p>Palettes per page </p>
      <select v-model="limit">
        <option v-for="item in limits" :value="item" :key="item">{{ item }}</option>
      </select>
    </div>
    <PaletteItems v-if="palettes" :palettes="palettes"/>
    <PreloaderComponent v-else/>
  </section>
</template>

<script>
import MainMixin from "@/mixins/MainMixin";
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import PaletteItems from "@/components/palette/PaletteItems.vue";

export default {
  name: "TopPalettes",
  components: {PaletteItems, PreloaderComponent},
  mixins: [MainMixin],
  props: {
    filters: Boolean,
    count: {
      type: Number,
      default: 6
    }
  },
  data() {
    return {
      limit: this.count,
      limits: [6, 12, 24, 48]
    }
  },
  mounted() {
    this.getPallets()
  },
  methods: {
    getPallets() {
      this.$store.dispatch('getPalletes', this.limit)
    }
  },
  computed: {
    palettes() {
      return this.$store.getters.getPalletes
    }
  },
  watch: {
    limit() {
      this.getPallets()
    }
  }
}
</script>

<style scoped lang="scss">
@import "@/assets/style/vars.scss";

section {

  .filters {
    display: flex;
    gap: 0 20px;
    justify-content: flex-end;

    @media (width <= $s) {
      display: none;
    }
  }
}
</style>