<template>
  <nav class="top-nav">
    <div>
      <img src="@/assets/logo.svg" height="30" alt="">
    </div>
    <input id="menu-toggle" type="checkbox"/>
    <label class='menu-button-container' for="menu-toggle">
      <span class='menu-button'></span>
    </label>
    <ul class="menu">
      <!--      <li>One</li>-->
      <!--      <li>Two</li>-->
      <!--      <li>Three</li>-->
      <!--      <li>Four</li>-->
      <li>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
        </svg>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "TopNavbar"
}
</script>

<style scoped lang="scss">

.top-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  background-color: #00BAF0;
  background: var(--navbar-bg);
  height: var(--navbar-height);
  padding: 1em;
  font-weight: 500;
  font-size: 18px;
  color: var(--navbar-color);

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
        background-color: var(--navbar-color);
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