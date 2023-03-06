<template>
  <main>
    <div class="main-actions">
      <button @click="newColors">
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
      <button class="title">{{ item.color }}</button>
      <div class="color-actions">
        <button class="hidden" :disabled="item.locked" @click="changeColor(item)">
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
        <button class="lock" @click="lock(index)">
          <svg v-if="item.locked" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
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
  </main>
</template>
<script>
export default {
  data() {
    return {
      firstGenerate: true,
      defaultColumns: 5,
      items: []
    }
  },
  mounted() {
    this.newColors()
    this.firstGenerate = false
  },
  methods: {
    newColors() {
      const columns = this.firstGenerate ? this.defaultColumns : this.items.length
      for (let i = 0; i < columns; i++) {
        if (this.firstGenerate) {
          this.items.push({color: this.generateColor(), locked: false})
        } else {
          if (!this.items[i].locked) {
            this.items[i].color = this.generateColor()
          }
        }
      }
    },
    generateColor() {
      const hexCodes = '0123456789abcdef'
      let color = '';
      for (let i = 0; i < 6; i++) {
        color += hexCodes[Math.floor(Math.random() * hexCodes.length)]
      }
      return '#' + color
    },
    lock(index) {
      this.items[index].locked = !this.items[index].locked
    },
    addColor() {
      this.items.push({color: this.generateColor(), locked: false})
    },
    changeColor(item) {
      item.color = this.generateColor()
    },
    removeColor(index) {
      this.items = this.items.filter((item, i) => {
        if (i !== index) {
          return item
        }
      })
    }
  }
}
</script>
<style scoped lang="scss">
main {
  height: calc(100vh - var(--navbar-height));
  display: flex;

  .main-actions {
    position: fixed;
    top: 90%;
    left: 50%;
    transform: translate(-50%, -90%);
    padding: 10px;
    background-color: var(--btn-hover-color);
    border-radius: 10px;
    display: flex;
    gap: 0 25px;

    button {
      &:not(:disabled) {
        &:active {
          svg {
            transform: rotate(180deg);
          }
        }
      }

      svg {
        transition: .3s;
        transform: rotate(0deg);
        color: white;
        height: 35px;
      }
    }
  }

  .item {
    height: 100%;
    width: 100%;
    display: flex;
    flex: 1;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;

    &:hover {
      .color-actions {
        button {
          &.hidden {
            margin-bottom: 15px;
            opacity: 1;
            visibility: visible;
          }
        }
      }
    }

    .title {
      color: white;
      font-size: 22px;
    }

    .color-actions {
      display: flex;
      flex-direction: column;

      button {
        transition: .3s;
        padding: 10px 12px;
        border-radius: 10px;

        &.hidden {
          visibility: hidden;
          opacity: 0;
        }

        svg {
          height: 30px;
          color: white;
        }

        &:hover {
          background-color: var(--btn-hover-color);
        }
      }
    }
  }
}
</style>