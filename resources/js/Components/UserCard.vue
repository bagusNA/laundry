<script setup>
import { usePage } from '@inertiajs/inertia-vue3';

const user = usePage().props.value.auth.user;
</script>

<template>
  <div class="user d-flex justify-content-between bg-primary text-light rounded-3">
    <div class="d-flex flex-column p-2">
      <span class="user__name">{{ user.nama }}</span>
      <span class="user__position">{{ user.posisi_kerja }}</span>
    </div>
  </div>
</template>

<style scoped lang="scss">
.user {
  padding-left: 1rem;

  &__name {
    font-size: 1rem;
    padding-bottom: 0.5rem;
  }

  &__position {
    font-size: 0.75rem;
  }
}
</style>