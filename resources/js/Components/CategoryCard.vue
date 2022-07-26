<script setup>
import { Icon } from '@iconify/vue';
</script>

<template>
  <a 
    class="category rounded bg-secondary text-light bg-opacity-75 text-center text-decoration-none"
    href="#"
  >
    <span class="category__logo">
      <Icon icon="ion:home" />
    </span>
    <p class="category__title">Category</p>
  </a>
</template>

<style scoped lang="scss">
.category {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  font-size: 1rem;
  padding: 1rem;
  transition: 100ms;

  &__logo {
    font-size: 2rem;
    padding-bottom: 1rem;
  }

  &:hover {
    cursor: pointer;
    opacity: 0.9;
  }
}
</style>