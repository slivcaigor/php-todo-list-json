<script>
import ToDo from "./components/ToDo.vue";

export default {
  components: {
    ToDo,
  },
};
</script>

<template>
  <ToDo />
</template>

<style lang="scss" scoped>
@use "./styles/general.scss" as *;
@use "./styles/partials/mixins" as *;
@use "./styles/partials/variables" as *;
</style>
