<template>
  <div class="wrapper grid mt-16 gap-16" v-if="palettes" :class="'grid-cols-'+cols">
    <div class="palette" v-for="item in palettes" :key="item.id">
      <p v-if="title" class="text-small pl-1 pb-1">{{ item.title }}</p>
      <div class="colors flex overflow-hidden rounded-xl h-32">
        <div
            class="color hover:basis-20 group/hex basis-1 grow duration-75 flex items-center justify-center cursor-pointer "
            v-for="color in item.palettes" :key="color"
            :style="{backgroundColor: color}">
          <p class="text bold hidden group-hover/hex:block" :style="{color: setTextColorByBgColor(color)}">
            {{ color }}</p>
        </div>
      </div>
      <LikeIPallete :liked="item.liked" :likes="item.likes" :id="item.id"/>
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
    cols: {
      type: Number,
      defaut: 3
    },
    palettes: Array,
    title: Boolean
  }
}
</script>

<style scoped lang="scss">
@import "@/assets/style/vars.scss";

.wrapper {
  @media (width <= $l) {
    grid-template-columns: 1fr 1fr;
  }
  @media (width <= $s) {
    grid-template-columns: 1fr;
  }
}
</style>