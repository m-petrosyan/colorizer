<template>
  <section class="resize">
    <div class="page-title">
      <h1 class="extra-title">Trending Color Palettes</h1>
      <p class="text grey">Get inspired by thousands of beautiful color schemes and make something cool!</p>
    </div>
    <div class="wrapper">
      <div class="palette" v-for="item in palettes" :key="item.id">
        <div class="colors">
          <div class="color" v-for="color in item.palettes" :key="color" :style="{backgroundColor: color}">
            <p class="text bold" :style="{color: setTextColorByBgColor(color)}">{{ color }}</p>
          </div>
        </div>
        <LikeIcon :liked="item.liked" :likes="item.likes"/>
      </div>
    </div>
  </section>
</template>

<script>
import MainMixin from "@/mixins/MainMixin";
import LikeIcon from "@/components/icons/LikeIcon.vue";

export default {
  name: "TopPalettes",
  components: {LikeIcon},
  mixins: [MainMixin],
  data() {
    return {
      limit: 6
    }
  },
  mounted() {
    this.$store.dispatch('getPalletes', this.limit)
  },
  computed: {
    palettes() {
      return this.$store.getters.getPalletes
    }
  }
}
</script>

<style scoped lang="scss">
section {
  .wrapper {
    margin-top: 100px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 60px;

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
}
</style>