<script setup>
import { Icon } from '@iconify/vue';

defineProps(['title', 'icon']);
</script>

<template>
  <div class="section bg-primary text-light rounded">
    <div class="section__header">
      <span class="section__header__icon fs-3">
        <Icon :icon="icon" />
      </span>
      <span class="fs-5">{{ title }}</span>
    </div>
    <div class="section__content">
      <slot></slot>
    </div>
  </div>
</template>

<style scoped lang="scss">
.section {
    padding: 0 0.75rem;

  &__header, &__header__icon {
    display: flex;
    align-items: center;
  }

  &__header {
    gap: 0 0.5rem;
    padding-top: 1rem;
    padding-bottom: 0.5rem;

    &__icon {
      justify-content: center;
    }
  }
}
</style>