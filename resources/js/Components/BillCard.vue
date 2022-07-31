<script setup>
import { computed } from '@vue/reactivity';
import { Icon } from '@iconify/vue';
import { currencyFormat } from '../utils/currencyFormat';
import { store } from '@/store';

const props = defineProps(['bill']);

const subtotal = computed(() => currencyFormat(props.bill.harga * props.bill.qty));
</script>

<template>
  <div class="serv-bill">
    <div class="serv-bill__logo bg-primary text-light rounded-3">
      <Icon icon="ion:home" />
    </div>
    <div class="serv-bill__content">
      <div class="serv-bill__content__name">
        {{ bill.nama }}
        <span 
          class="serv-bill__content__remove bg-danger"
          @click="() => store.deleteItem(bill.id)"
        >
          <Icon 
            icon="ion:trash-bin" 
            
          />
        </span>
      </div>
      <div class="serv-bill__content__qty">
        <Icon 
          icon="ion:remove-circle" 
          class="btn-icon" 
          @click="() => store.decrementLayanan(bill.id)"  
        />
        <input 
          type="text" class="form-control qty" placeholder="kg" aria-label="quantity" aria-describedby="basic-addon1"
          :value="bill.qty"
        >
        <Icon 
          icon="ion:add-circle" 
          class="btn-icon" 
          @click="() => store.incrementLayanan(bill.id)"  
        />
        kg
      </div>
    </div>
    <div class="serv-bill__estimate">
      {{ bill.estimasi_waktu }} jam
    </div>
    <div class="serv-bill__subtotal">
      {{ subtotal }}
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
      display: flex;
      justify-content: space-between;
      font-size: 1.1rem;
      padding-bottom: 0.5rem;
    }

    &__remove {
      padding: 0.1rem 0.3rem;
      border-radius: 0.3rem;
      transition: 100ms;
      user-select: none;
      filter: brightness(0.9);

      &:hover {
        cursor: pointer;
        filter: none;
      }
    }

    &__qty {
      display: flex;
      align-items: center;
      gap: 0 0.5rem;
    }
  }

  &__estimate {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
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