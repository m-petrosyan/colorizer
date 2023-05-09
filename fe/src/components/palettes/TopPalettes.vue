<template>
  <section class="resize">
    <div class="page-title">
      <h1 class="extra-title">Trending Color Palettes</h1>
      <p class="text grey">Get inspired by thousands of beautiful color schemes and make something cool!</p>
    </div>
    <div class="filters" v-if="filters">
      <p>Palettes per page </p>
      <select v-model="limit">
        <option v-for="item in limits" :value="item" :key="item">{{ item }}</option>
      </select>
    </div>
    <div class="wrapper" v-if="palettes">
      <div class="palette" v-for="item in palettes" :key="item.id">
        <div class="colors">
          <div class="color" v-for="color in item.palettes" :key="color" :style="{backgroundColor: color}">
            <p class="text bold" :style="{color: setTextColorByBgColor(color)}">{{ color }}</p>
          </div>
        </div>
        <LikeIPallete :liked="item.liked" :likes="item.likes"/>
      </div>
    </div>
    <PreloaderComponent v-else/>
  </section>
</template>

<script>
import MainMixin from "@/mixins/MainMixin";
import LikeIPallete from "@/components/elements/LikeIPallete.vue";
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";

export default {
  name: "TopPalettes",
  components: {PreloaderComponent, LikeIPallete},
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
@import "@/assets/vars.scss";

section {
  .wrapper {
    margin-top: 100px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 60px;

    @media (width <= $l) {
      grid-template-columns: 1fr 1fr;
    }

    @media (width <= $s) {
      grid-template-columns: 1fr;
    }

    .palette {

      .colors {
        display: flex;
        height: 130px;
        border-radius: 10px;
        overflow: hidden;

        .color {
          flex-basis: 1px;
          flex-grow: 1;
          transition: .3s;
          display: flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;

          p {
            display: none;
          }

          &:hover {
            flex-basis: 80px;

            p {
              display: block;
            }
          }
        }
      }
    }
  }

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