<template>
  <Teleport to="body">
    <div class="modal">
      <div class="modal-content">
        <button @click="popup('')">
          x
        </button>
        <SignIn :close="()=>popup('')"/>
      </div>
    </div>
  </Teleport>
</template>

<script>
import SignIn from "@/components/auth/SignIn.vue";

export default {
  name: "AuthLayout",
  props: {
    popup: Function
  },
  components: {SignIn},
}
</script>

<style scoped lang="scss">
.modal {
  position: fixed;
  z-index: 5;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #0000006e;

  .modal-content {
    border-radius: 5px;
    margin: 100px auto;
    background-color: white;
    min-height: 200px;
    width: 380px;
    padding: 20px;
  }
}
</style>