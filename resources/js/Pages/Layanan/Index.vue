<script setup>
import { computed } from '@vue/reactivity';
import { Link } from '@inertiajs/inertia-vue3';
import { currencyFormat } from '@/utils/currencyFormat';
import { store } from '@/store';

import Navbar from '@/Components/Navbar.vue';
import Category from '@/Components/CategoryCard.vue';
import UserCard from '@/Components/UserCard.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import BillCard from '@/Components/BillCard.vue';
import bgImage from '@/assets/img/bg-full.jpeg';

defineProps(['layananList']);

const totalString = computed(() => currencyFormat(store.total));
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
        <ServiceCard v-for="layanan in layananList"
          :name="layanan.nama" 
          :price="layanan.harga"
          icon="ion:home"
          :onClick="() => store.addItem(layanan)"
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
          <BillCard v-for="bill in store.cart" 
            :bill="bill"
          />
        </div>

        <div class="bill__total-wrapper">
          Total: <span class="bill__total">{{ totalString }}</span>
        </div>
        <Link
          class="bill__next-btn bg-primary text-light"
          href="/checkout"
        >
          Selanjutnya
        </Link>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss">
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
    text-decoration: none;

    &:hover {
      cursor: pointer;
      opacity: 0.9;
    }
  }
}

@media only screen and (min-width: 768px) {  
  .main {
    padding: 1.5rem 2rem;

    .service-list {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
  }
}
</style>