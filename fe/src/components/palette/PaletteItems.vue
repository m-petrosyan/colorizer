<template>
  <div class="wrapper" v-if="palettes">
    <div class="palette" v-for="item in palettes" :key="item.id">
      <p v-if="title" class="text-small pl-1 pb-1">{{ item.title }}</p>
      <div class="colors">
        <div class="color" v-for="color in item.palettes" :key="color" :style="{backgroundColor: color}">
          <p class="text bold" :style="{color: setTextColorByBgColor(color)}">{{ color }}</p>
        </div>
      </div>
      <LikeIPallete :liked="item.liked" :likes="item.likes"/>
    </div>
  </div>
</template>

<script>
import MainMixin from "@/mixins/MainMixin";
import LikeIPallete from "@/components/elements/LikeIPallete.vue";

export default {
  name: "PaletteItems",
  components: {LikeIPallete},
  mixins: [MainMixin],
  props: {
    palettes: Array,
    title: Boolean
  }
}
</script>

<style scoped lang="scss">
@import "@/assets/style/vars.scss";

.wrapper {
  margin-top: 80px;
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
</style>