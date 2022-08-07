<script setup>
import { computed } from '@vue/reactivity';
import { Link } from '@inertiajs/inertia-vue3';
import { currencyFormat } from '@/utils/currencyFormat';
import { store } from '@/store';

import BaseLayout from '@/Components/layouts/BaseLayout.vue';
import CategoryCard from '@/Components/CategoryCard.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import BillCard from '@/Components/BillCard.vue';

defineProps(['layananList', 'kategoriList']);

const totalString = computed(() => currencyFormat(store.total));
</script>

<template>
  <BaseLayout>
    <template #title>Layanan</template>
    <template #content>
      <div class="category-list">
        <CategoryCard name="Semua" icon="ion:albums" />
        <CategoryCard v-for="kategori in kategoriList"
          :name="kategori.nama_jenis"  
        />
      </div>
      <div class="service-list">
        <ServiceCard v-for="layanan in layananList"
          :name="layanan.nama" 
          :price="layanan.harga"
          icon="ion:home"
          :onClick="() => store.addItem(layanan)"
        />
      </div>
    </template>
    <template #side-title>Bill</template>
    <template #side-content>
      <div class="bill__content">
        <BillCard v-for="bill in store.cart" 
          :bill="bill"
        />
      </div>

      <div class="bill__btn-wrapper">
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

    </template>
  </BaseLayout>
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
  width: 30%;
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

  &__btn-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    font-size: 1.5rem;
    // padding-bottom: 0.75rem;
  }

  &__total-wrapper {
    display: flex;
    padding-bottom: 0.5rem;
  }

  &__total {
    flex-grow: 1;
    text-align: end;
    font-weight: bold;
  }

  &__next-btn {
    padding: 0.75rem;
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