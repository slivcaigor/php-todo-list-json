<script>
import ToDo from "./components/ToDo.vue";
import Sidenav from "./components/Sidenav.vue";

export default {
  components: {
    ToDo,
    Sidenav,
  },
};
</script>

<template>
  <section class="d-flex">
    <Sidenav />
    <ToDo class="flex-grow-1" />
  </section>
</template>

<style lang="scss" scoped>
@use "./styles/general.scss" as *;
@use "./styles/partials/mixins" as *;
@use "./styles/partials/variables" as *;
</style>
