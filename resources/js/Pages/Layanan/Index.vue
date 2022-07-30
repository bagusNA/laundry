<script setup>
import { ref } from 'vue';
import { computed } from '@vue/reactivity';
import { currencyFormat } from '../../utils/currencyFormat';

import Navbar from '@/Components/Navbar.vue';
import Category from '@/Components/CategoryCard.vue';
import UserCard from '@/Components/UserCard.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import BillCard from '@/Components/BillCard.vue';
import bgImage from '@/assets/img/bg-full.jpeg'

const total = ref(0);
const totalString = computed(() => currencyFormat(total.value));
const billList = ref([]);

// Dummy data
const serviceList = [
  {
    id: 1,
    name: 'Reguler 3 Hari',
    time: 72,
    price: 5000,
    icon: 'ion:home'
  },
  {
    id: 2,
    name: 'Express 1 Hari',
    time: 24,
    price: 7000,
    icon: 'ion:home'
  },
  {
    id: 3,
    name: 'Express 12 Jam',
    time: 12,
    price: 9000,
    icon: 'ion:home'
  },
  {
    id: 4,
    name: 'Reguler 2 Hari',
    time: 48,
    price: 5000,
    icon: 'ion:home'
  },
  {
    id: 5,
    name: 'Setrika 24 jam',
    time: 24,
    price: 5000,
    icon: 'ion:home'
  },
  {
    id: 6,
    name: 'Bedcover 7 hari',
    time: 168,
    price: 20000,
    icon: 'ion:home'
  },
]

function hi() {
  console.log('hi')
}

function addToBill(id) {
  let service;

  if (billList.value.length) {
    service = billList.value.find(item => item.id === id);
  }

  // Increment qty if already in list
  if (service) {
    const index = billList.value.indexOf(service);
    billList.value[index] = {
      ...service, 
      qty: service.qty + 1,
    }
    total.value += service.price;
    
    return;
  }

  if (!service) {
    service = serviceList.find(item => item.id === id);
  }
  
  billList.value.push({
    ...service,
    qty: 1,
  });
  total.value += service.price;
}

function deleteFromBill(id) {
  const service = billList.value.find(item => item.id === id);
  const index = billList.value.indexOf(service);

  if (index > -1) billList.value.splice(index, 1);
  total.value -= service.qty * service.price;
}

function changeQty(id, isIncrement) {
  const service = billList.value.find(item => item.id === id);

  if (isIncrement) {
    service.qty++;
    total.value += service.price;
  }
  else {
    if (service.qty <= 1) return;
    service.qty--;
    total.value -= service.price;
  }
}
</script>

<template>
  <div class="wrapper"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <Navbar class="sidebar"/>
    <main class="main">
      <h2 class="title">Daftar Layanan</h2>
      <div class="category-list">
        <Category v-for="n in 5" />
      </div>
      <div class="service-list">
        <ServiceCard v-for="service in serviceList"
          :name="service.name" 
          :price="service.price"
          :icon="service.icon"
          :onClick="() => addToBill(service.id)"
        />
      </div>
    </main>
    <aside class="side-content">
      <div class="side-content__user-wrapper">
        <UserCard name="Joko Susanto" position="Cashier" />
      </div>
      <div class="bill bg-secondary">
        <span class="bill__title">Bill</span>
        <div class="bill__content">
          <BillCard v-for="bill in billList" 
            :bill="bill"
            :deleteAction="deleteFromBill"
            :changeAction="changeQty"
          />
        </div>

        <div class="bill__total-wrapper">
          Total: <span class="bill__total">{{ totalString }}</span>
        </div>
        <div
          class="bill__next-btn bg-primary text-light"
          @click="hi"
        >
          Selanjutnya
        </div>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss">
.main {
  flex: 1;
  padding: 1rem 1.5rem;
  height: 100vh;
  overflow: auto;

  .title {
    padding-bottom: 1.5rem;
  }

  .category-list {
    display: flex;
    gap: 0 10px;
    padding-bottom: 1.5rem;
  }

  .service-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    justify-content: space-between;
    gap: 15px;
  }
}

.side-content {
  width: 35%;
  padding-top: 0.5rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;

  &__user-wrapper {
    padding-right: 1.5rem;
  }
}

.bill {
  flex-grow: 1;
  padding: 1rem 1.5rem;
  border-top-left-radius: 10px;
  display: flex;
  flex-direction: column;

  &__title {
    font-size: 2rem;
    padding-bottom: 1rem;
  }

  &__content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 2rem 0;
    padding-bottom: 2rem;
  }

  &__total-wrapper {
    display: flex;
    justify-content: space-between;
    font-size: 1.5rem;
    padding-bottom: 0.75rem;
  }

  &__total {
    font-weight: bold;
  }

  &__next-btn {
    padding: 1.5rem 1rem;
    border-radius: 10px;
    font-size: 1.5rem;
    text-align: center;
    transition: 100ms;

    &:hover {
      cursor: pointer;
      opacity: 0.9;
    }
  }
}

@media only screen and (min-width: 768px) {
  .sidebar {
    min-width: 6rem;
  }
  
  .main {
    padding: 1.5rem 2rem;

    .service-list {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
  }
}
</style>