<template>
  <section class="generate-footer">
    <button @click="newColors">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
           stroke="currentColor"
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
      </svg>
    </button>
    <button @click="addColor" :disabled="length >= 10">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
           stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
      </svg>
    </button>
    <button class="favorite">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
           stroke="currentColor"
           class="active w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
      </svg>
    </button>
  </section>
</template>
<script>
export default {
  name: "GenerateFooterTools",
  props: {
    newColors: Function,
    addColor: Function,
    length: Number
  }
}
</script>

<style scoped lang="scss">
@import "@/assets/vars.scss";

.generate-footer {
  padding: 5px;
  height: 40px;
  display: flex;
  justify-content: space-around;

  @media (width > $s) {
    display: none;
  }

  button {
    svg {
      height: 80%;
      color: #333333;
    }

    .favorite {
      &:hover {
        svg {
          &.inactive {
            visibility: visible;
            opacity: 1;
            width: 35px;

            &:active {
              color: #f1e670;
            }
          }

          &.active {
            visibility: hidden;
            opacity: 0;
            width: 0;
          }
        }
      }

      svg {
        transition: .3s;
        width: 35px;

        &.inactive {
          width: 0;
          opacity: 0;
          visibility: hidden;
        }
      }
    }
  }


}

</style>