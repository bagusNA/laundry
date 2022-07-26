<script setup>
import { Icon } from '@iconify/vue';

defineProps(['name', 'price', 'image', 'icon', 'onClick']);
</script>

<template>
  <div 
    class="service bg-primary rounded-3"
    @click="onClick"
  >
    <div class="d-flex flex-column justify-content-center align-items-center text-light rounded-top p-3">
      <img v-if="image"
        :src="image" 
        alt="Service Logo"
      >
      <Icon v-else-if="icon" 
        :icon="icon"
        class="service__icon"
      />
      <span>{{ name }}</span>
    </div>
    <div class="service__price bg-secondary text-light rounded-bottom">Rp. {{ price }} / kg</div>
  </div>
</template>

<style scoped lang="scss">
.service {
  transition: 100ms;

  &__icon {
    font-size: 2rem;
    margin: 1rem 0;
  }

  &__price {
    padding: 0.5rem 0;
    text-align: center;
  }

  &:hover {
    cursor: pointer;
    opacity: 0.9;
  }
}
</style>