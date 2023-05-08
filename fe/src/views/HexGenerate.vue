<template>
  <section class="generate-area">
    <div class="actions top">
      <button class="favorite">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor"
             class="active w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inactive w-6 h-6">
          <path
              d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
        </svg>
      </button>
    </div>
    <div class="actions bottom">
      <button @click="generateColors">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor"
             class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
        </svg>
      </button>
      <button @click="addColor" :disabled="items.length >= 10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
      </button>
    </div>
    <div class="item" v-for="(item,index) in items" :key="item.color" :style="{backgroundColor: item.color}">
      <button class="title bold" :style="{color: setTextColorByBgColor(item.color)}">{{ item.color }}</button>
      <div class="color-actions">
        <button class="hidden" :disabled="item.locked" @click="changeColor(item,index)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
          </svg>
        </button>
        <button class="hidden" @click="removeColor(index)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
        <button class="hidden" @click="copyColor(item.color)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z"/>
          </svg>
        </button>
        <button class="lock" @click="lock(index)">
          <svg v-if="item.locked" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
          </svg>
        </button>
      </div>
    </div>
    <GenerateFooterTools :newColors="newColors" :addColor="addColor" :length="items.length"/>
  </section>
</template>
<script>

import GenerateFooterTools from "@/components/elements/GenerateFooterTools.vue";
import MainMixin from "@/mixins/MainMixin";

export default {
  name: "HexGenerate",
  mixins: [MainMixin],
  components: {GenerateFooterTools},
  data() {
    return {
      firstGenerate: true,
      defaultColumns: 5,
      items: [],
      hash: null
    }
  },
  created() {
    if (!this.$route.hash) {
      this.generateColors()
    } else {
      this.firstGenerate = true
      this.hash = this.$route.hash.substr(1).split("-")
      this.newColors()
    }
  },
  mounted() {
    this.firstGenerate = false
  },
  methods: {
    newColors() {
      const columns = this.firstGenerate ? this.hash?.length ?? this.defaultColumns : this.items.length
      let hex = ''
      let hexColor
      for (let i = 0; i < columns; i++) {
        if (this.firstGenerate) {
          hexColor = this.hash ? '#' + this.hash[i] : this.generateColor()
          this.items.push({color: hexColor, locked: false})
        } else {
          if (!this.items[i].locked) {
            hexColor = this.changeColor(this.items[i], i)
          } else {
            hexColor = this.items[i].color
          }
        }
        hex += hexColor.substr(1)
        if (i + 1 !== columns) {
          hex += '-';
        }
      }
      return hex
    },
    generateColors() {
      this.$router.push({name: "generate", hash: '#' + this.newColors()})
    },
    generateColor() {
      const hexCodes = '0123456789abcdef'
      let hex = '';
      for (let i = 0; i < 6; i++) {
        hex += hexCodes[Math.floor(Math.random() * hexCodes.length)]
      }
      return '#' + hex
    },
    lock(index) {
      this.items[index].locked = !this.items[index].locked
    },
    copyColor(color) {
      navigator.clipboard.writeText(color)
    },
    addColor() {
      const newColor = this.generateColor()
      this.items.push({color: newColor, locked: false})
      const newHash = '-' + newColor.substr(1)
      this.$router.push({hash: this.$route.hash + newHash})
    },
    changeColor(item, index) {
      const allHesh = this.$route.hash.substr(1).split("-");
      const newHex = this.generateColor();
      allHesh[index] = newHex.substr(1)
      this.$router.push({hash: '#' + allHesh.join('-')})
      item.color = newHex
      return newHex;
    },
    removeColor(index) {
      const allHesh = this.$route.hash.substr(1).split("-");
      let newHash = []
      this.items = this.items.filter((item, i) => {
        if (i !== index) {
          newHash.push(allHesh[i])
          return item
        }
      })
      this.$router.push({hash: '#' + newHash.join('-')})
    }
  }
}
</script>
<style scoped lang="scss">
@import "@/assets/vars.scss";

.generate-area {
  height: calc(100vh - var(--navbar-height));
  display: flex;

  @media (width <= $l) {
    flex-direction: column;
  }

  .actions {
    position: fixed;
    padding: 10px;
    background-color: var(--btn-hover-color);
    border-radius: 10px;
    display: flex;
    gap: 0 25px;

    @media (width <= $s) {
      display: none;
    }

    &.top {
      top: 10%;
      left: 50%;
      transform: translate(-50%, -10%);

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

    button {
      svg {
        transition: .3s;
        color: white;
        height: 35px;
      }
    }

    &.bottom {
      top: 90%;
      left: 50%;
      transform: translate(-50%, -90%);
      flex-direction: row;

      @media (height <= $m) {
        top: 100%;
      }

      button {
        &:not(:disabled) {
          &:active {
            svg {
              transform: rotate(180deg);
            }
          }
        }

        svg {
          transform: rotate(0deg);
        }
      }
    }
  }

  .item {
    height: 100%;
    width: 100%;
    display: flex;
    flex: 1;
    justify-content: space-around;
    align-items: center;
    flex-direction: column;

    &:hover {
      .color-actions {
        button {
          &.hidden {
            opacity: 1;
            visibility: visible;
          }
        }
      }
    }

    @media (width > $l) {
      &:hover {
        .color-actions {
          button {
            &.hidden {
              margin-bottom: 15px;
            }
          }
        }
      }
    }

    @media (width <= $l) {
      flex-direction: row;
    }

    .title {
      color: white;
      font-size: 22px;
    }

    .color-actions {
      display: flex;
      flex-direction: column;
      z-index: 1;

      @media (width <= $l) {
        flex-direction: row;
      }

      button {
        transition: .3s;
        padding: 10px 12px;
        border-radius: 10px;

        &.hidden {
          visibility: hidden;
          opacity: 0;
          @media (width <= $s) {
            visibility: visible;
            opacity: 1;
          }
        }

        svg {
          height: 30px;
          color: white;
        }

        &:hover {
          background-color: var(--btn-hover-color);

          &:active {
            background-color: var(--btn-active-color);
          }
        }
      }
    }
  }
}
</style>