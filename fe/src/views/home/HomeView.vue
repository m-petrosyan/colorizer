<template>
  <section class="main-page resize">
    <div class="content">
      <div class="main-info">
        <div class="info">
          <h1 class="extra-title">
            The super fast color palettes generator!
          </h1>
          <p class="text grey">
            Create the perfect palette or get inspired by thousands of beautiful color schemes.
          </p>
          <div class="btn-content">
            <router-link :to="{name:'generate'}" class="btn blue">
              Start the generator
            </router-link>
            <router-link :to="{name: 'explore'}" class="btn white">
              Explore trending palettes
            </router-link>
          </div>
        </div>
      </div>
      <LogoIcon/>
    </div>
    <TopPalettes/>
  </section>
</template>

<script>
import TopPalettes from "@/components/palettes/TopPalettes.vue";
import LogoIcon from "@/components/icons/LogoIcon.vue";
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";

export default {
  name: "HomeView",
  data() {
    return {}
  },
  components: {PreloaderComponent, LogoIcon, TopPalettes},
}
</script>

<style scoped lang="scss">
@import "@/assets/style/vars.scss";

.main-page {
  .content {
    display: flex;
    justify-content: center;
    width: 80%;
    margin: auto;
    @media (width <= $l) {
      width: 100%;
    }

    & > div {
      width: 50%;
      @media (width <= $l) {
        width: 100%;
      }

      &.main-info {
        .info {
          text-align: center;

          .btn-content {
            margin: 50px auto auto auto;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            @media (width <= $s) {
              max-width: unset;
            }
          }
        }
      }
    }
  }
}
</style>