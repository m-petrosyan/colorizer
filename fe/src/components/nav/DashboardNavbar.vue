<template>
  <ul class="nav px-5 border-r-[1px] border-milky-white min-w-[250px]">
    <li class="whitespace-nowrap">
      <router-link :to="{name:'db-palettes'}" class="flex gap-x-2 items-center py-1 px-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-palette" width="25" height="25"
             viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path
              d="M12 21a9 9 0 0 1 0 -18c4.97 0 9 3.582 9 8c0 1.06 -.474 2.078 -1.318 2.828c-.844 .75 -1.989 1.172 -3.182 1.172h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25"/>
          <path d="M8.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
          <path d="M12.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
          <path d="M16.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
        </svg>
        <p>My Palettes</p>
      </router-link>
    </li>
    <li class="mt-5 whitespace-nowrap">
      <router-link :to="{name:'db-liked-palettes'}" class="flex gap-x-2 items-center py-1 px-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="25" height="25"
             viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
        </svg>
        <p>Liked Palettes</p>
      </router-link>
    </li>
    <li class="mt-5 whitespace-nowrap">
      <router-link :to="{name:'db-settings'}" class="flex gap-x-2 items-center  py-1 px-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-horizontal" width="25"
             height="25" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
          <path d="M4 6l8 0"/>
          <path d="M16 6l4 0"/>
          <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
          <path d="M4 12l2 0"/>
          <path d="M10 12l10 0"/>
          <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
          <path d="M4 18l11 0"/>
          <path d="M19 18l1 0"/>
        </svg>
        <p>Settings</p>
      </router-link>
    </li>
  </ul>
</template>

<script>
export default {
  name: "DashboardNavbar"
}
</script>

<style scoped lang="scss">
.router-link-exact-active {
  background-color: #ededed;
}
</style>