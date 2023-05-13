<template>
  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
       y="0px"
       viewBox="0 0 595.3 841.9" style="enable-background:new 0 0 595.3 841.9;" xml:space="preserve">
    <g id="_x33_c320f15-7d71-4cdc-8cde-a7d5a490045e">
      <path class="st0" d="M24.4,535.7c0-152.3,275.8-486.8,275.8-486.8S576,383.3,576,535.7c0,152.3-123.5,275.8-275.8,275.8
        C147.9,811.5,24.4,688,24.4,535.7z"/>
    </g>
  </svg>
</template>

<script>
export default {
  name: "LogoIcon"
}
</script>

<style scoped lang="scss">
@import "@/assets/style/vars.scss";

svg {
  margin: auto;
  height: 325px;
  stroke: #ef4444;
  fill: transparent;
  stroke-width: 30px;
  @media (width <= $l) {
    display: none;
  }

  g {
    animation: spin 10s linear infinite;
  }

  @-webkit-keyframes spin {
    0% {
      stroke: #264653;
    }
    20% {
      stroke: #2a9d8f;
    }
    40% {
      stroke: #e9c46a;
    }
    60% {
      stroke: #f4a261;
    }
    80% {
      stroke: #e76f51;
    }
    100% {
      stroke: #264653;
    }
  }
}
</style>