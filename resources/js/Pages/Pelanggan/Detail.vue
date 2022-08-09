<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { currencyFormat } from '@/utils/currencyFormat';
import { dateFormat } from '@/utils/dateFormat';
import BaseLayout from '@/Components/layouts/BaseLayout.vue';
import CheckoutDetailCard from '@/Components/layouts/CheckoutDetailCard.vue';

defineProps(['pelanggan']);
</script>

<template>
  <BaseLayout>
    <template #title>Detail Pelanggan</template>
    <template #content>
      <div class="content-wrapper">
        <CheckoutDetailCard title="Data Pelanggan" icon="ion:person">
          <div class="d-flex justify-content-center pb-3">
            <span class="flex-grow-1 d-flex flex-column justify-content-center  gap-2">
              <h2>{{ pelanggan.nama }}</h2>
              <h5>{{ pelanggan.no_hp }}</h5>
            </span>
            <p class="w-50 flex-center">{{ pelanggan.alamat }}</p>
          </div>
        </CheckoutDetailCard>
        <CheckoutDetailCard title="Riwayat Pesanan" icon="ion:list-circle">
          <div class="card-wrapper">
            <div class="card">
              <ul class="list-group list-group-flush">
                <li v-for="(transaksi, index) in pelanggan.transaksi" 
                  class="list-group-item d-flex justify-content-between align-items-center"
                >
                  <div class="d-flex flex-column flex-grow-1">
                    {{ dateFormat(transaksi.waktu_dibuat) }}
                  </div>
                  <span class="px-3"><b>{{ currencyFormat(transaksi.total_harga) }}</b></span>
                  <Link :href="`/transaksi/detail/${transaksi.id}`"
                    class="btn btn-primary"
                  >
                    Detail
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </CheckoutDetailCard>
      </div>
    </template>
    <template #side-title>Action</template>
    <template #side-content>WIP</template>
  </BaseLayout>
</template>

<style scoped lang="scss">
.content-wrapper {
  display: flex;
  flex-direction: column;
  gap: 1rem 0;
}

.card-wrapper {
  padding-bottom: 0.5rem;
}
</style>