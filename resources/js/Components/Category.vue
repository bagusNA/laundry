<script setup>
import { Icon } from '@iconify/vue';
</script>

<template>
  <a 
    class="category__item p-2 rounded bg-secondary text-light bg-opacity-75 text-center text-decoration-none"
    href="#"
  >
    <span class="category__item__logo">
      <Icon icon="ion:home" />
    </span>
    <p class="category__item__title">Category</p>
  </a>
</template>

<style scoped lang="scss">
.category__item {
  font-size: 0.8rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;

  &__logo {
    font-size: 1.5rem;
    padding-bottom: 1rem;
  }
}
</style>