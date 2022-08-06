<script setup>
import { Icon } from '@iconify/vue';

defineProps(['name', 'icon']);
</script>

<template>
  <a href="#"
    class="category rounded bg-secondary text-center text-decoration-none"
  >
    <span class="category__logo">
      <Icon :icon="icon ?? 'ion:home'" />
    </span>
    <p class="category__title">{{ name }}</p>
  </a>
</template>

<style scoped lang="scss">
.category {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  font-size: 1rem;
  width: 7.5rem;
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