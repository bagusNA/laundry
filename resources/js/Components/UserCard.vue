<script setup>
defineProps(['name', 'position', 'picture']);
</script>

<template>
  <div class="d-flex justify-content-between bg-primary rounded-3">
    <div class="d-flex flex-column p-2">
      <span class="user__name">{{ name }}</span>
      <span class="user__position">{{ position }}</span>
    </div>
    <!-- <div class="d-flex justify-content-center align-items-center rounded-3"> -->
      <img 
        :src="picture ?? 'https://via.placeholder.com/50'" 
        :alt="`${name} Profile Picture`"
        class="user__picture"
      >
    <!-- </div> -->
  </div>
</template>

<style scoped lang="scss">
.user {
  &__name {
    font-size: 1rem;
    padding-bottom: 0.5rem;
  }

  &__position {
    font-size: 0.75rem;
  }

  &__picture {
    
  }
}
</style>