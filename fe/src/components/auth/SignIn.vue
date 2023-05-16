<template>
  <h3 class="text-big  font-bold text-center">
    Sign in
  </h3>
  <form class="bg-white px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input v-model="form.username"
             class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
             id="username" type="text" placeholder="Username">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input v-model="form.password"
             class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
             id="password" type="password" placeholder="**********">
    </div>
    <div class="flex items-center justify-between">
      <button class="btn blue w-full" type="button" @click="submit">
        Sign In
      </button>
    </div>
  </form>
</template>

<script>
export default {
  name: "SignIn",
  props: {
    close: Function
  },
  data() {
    return {
      form: {
        username: 'john@gmail.com',
        password: '12345678'
      }
    }
  },
  methods: {
    submit() {
      this.$store.dispatch('signIn', this.form).then(() => {
        this.$store.dispatch('auth').then(() => this.close())
      })
    }
  }
}
</script>

<style scoped>

</style>