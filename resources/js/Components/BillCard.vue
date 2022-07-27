<script setup>
import { Icon } from '@iconify/vue';

defineProps(['serviceName', 'timeEstimate', 'price', 'quantity', 'icon']);
</script>

<template>
  <div class="serv-bill">
    <div class="serv-bill__logo bg-secondary text-light rounded-3">
      <Icon :icon="icon" />
    </div>
    <div class="serv-bill__content">
      <div class="serv-bill__content__name">{{ serviceName }}</div>
      <div class="serv-bill__content__qty">
        <Icon 
          icon="ion:remove-circle" 
          class="btn-icon" 
          @click="quantity--"  
        />
        <input 
          type="text" class="form-control qty" placeholder="kg" aria-label="quantity" aria-describedby="basic-addon1"
          :value="quantity"
        >
        <Icon 
          icon="ion:add-circle" 
          class="btn-icon" 
          @click="quantity++"  
        />
        kg
      </div>
    </div>
    <div class="serv-bill__estimate">
      {{ timeEstimate }} jam
    </div>
    <div class="serv-bill__subtotal">
      Rp. {{ price * quantity }}
    </div>
  </div>
</template>

<style scoped lang="scss">
.serv-bill {
  display: grid;
  grid-template-columns: 1fr 4fr;
  grid-template-rows: 2fr 1fr;
  gap: 10px 2rem;
  border-radius: 10px;
  padding: 0 10px;

  &__logo {
    font-size: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  &__content {
    &__name {
      font-size: 1.1rem;
      padding-bottom: 0.5rem;
    }

    &__qty {
      display: flex;
      align-items: center;
      gap: 0 0.5rem;
    }
  }

  &__estimate {
    text-align: center;
  }
  
  &__subtotal {
    font-weight: bold;
    text-align: end;
    font-size: 1.25rem;
  }
}

.qty {
  width: 5rem;
  height: 2rem;
  text-align: center;
}

.btn-icon {
  font-size: 2rem;
  transition: 100ms;

  &:hover {
    opacity: 0.8;
    cursor: pointer;
  }
}
</style>