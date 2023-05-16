<template>
  <nav class="top-nav flex-row flex bg-milky-white justify-between items-center text-grey-blue h-navbar px-6">
    <router-link to="/">
      <img class="logo" src="@/assets/logo.svg" alt="logo">
    </router-link>
    <input id="menu-toggle" type="checkbox"/>
    <label class='menu-button-container' for="menu-toggle">
      <span class='menu-button bg-grey-blue before:bg-grey-blue  after:bg-grey-blue'></span>
    </label>
    <ul class="menu">
      <li>
        <router-link :to="{name:'generate'}">
          Generate
        </router-link>
      </li>
      <li>
        <router-link :to="{name: 'explore'}">
          Explore
        </router-link>
      </li>
      <li>
        <button @click="!user ? popup('auth') : logout()" :class="{'rotate-180 text-orange': user}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
          </svg>
        </button>
      </li>
    </ul>
  </nav>
  <AuthLayout v-if="authPopup" v-model:popup="popup"/>
</template>

<script>
import AuthLayout from "@/components/auth/AuthLayout.vue";

export default {
  name: "TopNavbar",
  components: {AuthLayout},
  props: {
    authPopup: String
  },
  computed: {
    user() {
      return this.$store.getters.getAuth
    }
  },
  methods: {
    popup(val) {
      this.$emit('update:authPopup', val)
    },
    logout() {
      sessionStorage.clear();
      this.$router.push({name: 'home'}).then(() => this.$router.go(0))
    }
  }
}
</script>

<style scoped lang="scss">

.top-nav {
  font-size: 18px;

  .logo {
    height: 30px;
  }

  .menu-button-container {
    display: none;
    height: 100%;
    width: 30px;
    cursor: pointer;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    .menu-button {

      &, &::before,
      &::after {
        display: block;
        //background-color: #607d8b;
        position: absolute;
        height: 4px;
        width: 30px;
        transition: transform 400ms cubic-bezier(0.23, 1, 0.32, 1);
        border-radius: 2px;
      }

      &::before {
        content: '';
        margin-top: -8px;
      }

      &::after {
        content: '';
        margin-top: 8px;
      }
    }
  }

  #menu-toggle {
    display: none;

    &:checked + .menu-button-container {
      .menu-button {
        background: rgba(255, 255, 255, 0);

        &::before {
          margin-top: 0px;
          transform: rotate(405deg);
        }

        &::after {
          margin-top: 0px;
          transform: rotate(-405deg);
        }
      }
    }
  }

  .menu {
    display: flex;
    flex-direction: row;
    list-style-type: none;
    margin: 0;
    padding: 0;

    & > li {
      font-weight: 600;
      margin: 0 1rem;

      svg {
        height: 30px;
      }
    }
  }

  @media (max-width: 700px) {
    .menu-button-container {
      display: flex;
    }
    .menu {
      position: absolute;
      top: 0;
      margin-top: 50px;
      left: 0;
      flex-direction: column;
      width: 100%;
      justify-content: center;
      align-items: center;
    }
    #menu-toggle {
      & ~ .menu li {
        height: 0;
        margin: 0;
        padding: 0;
        border: 0;
        transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
      }

      &:checked ~ .menu li {
        border: 1px solid #333;
        height: 2.5em;
        padding: 0.5em;
        transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
      }
    }

    .menu {
      & > li {
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 0.5em 0;
        width: 100%;
        color: white;
        background-color: #222;

        &:not(:last-child) {
          border-bottom: 1px solid #444;
        }
      }
    }
  }
}
</style>