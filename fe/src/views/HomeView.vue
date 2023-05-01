<template>
  <section class="main-page resize">
    <div class="content">
      <div class="main-info">
        <div class="info">
          <h1 class="homepage-title">
            The super fast color palettes generator!
          </h1>
          <p class="text">
            Create the perfect palette or get inspired by thousands of beautiful color schemes.
          </p>
          <div class="btn-content">
            <router-link :to="{name:'hex'}" class="btn blue">
              Start the generator
            </router-link>
            <!--            <router-link :to="{name: 'explore'}" class="btn white">-->
            <!--              Explore trending palettes-->
            <!--            </router-link>-->
          </div>
        </div>
      </div>
      <div class="img-visualization">
        <div class="img"></div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "HomeView",
}
</script>

<style scoped lang="scss">
.main-page {
  .content {
    display: flex;

    & > div {
      width: 50%;

      &.main-info {
        .info {
          width: 75%;
          text-align: center;

          .homepage-title {
            font-size: 70px;
            font-weight: 700;
            line-height: 70px;
          }

          .btn-content {
            margin: auto;
            max-width: 60%;
            display: flex;
            flex-direction: column;
            gap: 15px;
          }
        }
      }

      &.img-visualization {
        .img {
          width: 400px;
          height: 400px;
          margin: auto;
          border: 2px solid #e1e1e1;
          border-radius: 100%;
          background-image: url("@/assets/visualization.png");
          animation: spin 30s linear infinite;
        }

        @-webkit-keyframes spin {
          0% {
            background-size: 35%;
            background-position: 0 0;
          }
          33% {
            background-size: 200%;
            background-position: 100% 0;
          }
          66% {
            background-position: 100% 100%;
          }
          80% {
            background-size: 100%;
            background-position: 0 100%;
          }
        }
      }
    }
  }
}
</style>