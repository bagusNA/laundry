<script setup>
import { currencyFormat } from '@/utils/currencyFormat';
import BaseLayout from '@/Components/layouts/BaseLayout.vue';
import CheckoutDetailCard from '@/Components/layouts/CheckoutDetailCard.vue';

defineProps(['transaksi']);
</script>

<template>
  <BaseLayout>
    <template #title>Detail Transaksi</template>
    <template #content>
      <div class="content-wrapper">
        <CheckoutDetailCard title="Data Pelanggan" icon="ion:person">
          <div class="d-flex justify-content-center pb-3">
            <span class="flex-grow-1 d-flex flex-column justify-content-center  gap-2">
              <h2>{{ transaksi.pelanggan.nama }}</h2>
              <h5>{{ transaksi.pelanggan.no_hp }}</h5>
            </span>
            <p class="w-50 flex-center">{{ transaksi.pelanggan.alamat }}</p>
          </div>
        </CheckoutDetailCard>
        <CheckoutDetailCard title="Daftar Pesanan" icon="ion:list-circle">
          <div class="card-wrapper">
            <div class="total">Total: <b>{{ currencyFormat(transaksi.total_harga) }}</b></div>
            <div class="card">
              <ul class="list-group list-group-flush">
                <li v-for="detail in transaksi.details" 
                  class="list-group-item d-flex justify-content-between align-items-center"
                >
                  <div class="d-flex flex-column flex-grow-1">
                    {{ detail.layanan.nama }}
                    <span class="waktu">{{ detail.layanan.estimasi_waktu }} jam</span>
                  </div>
                  <span class="px-3">{{ detail.berat }} kg</span>
                  <span class="px-3"><b>{{ currencyFormat(detail.subtotal) }}</b></span>
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

.waktu {
  font-size: 0.8rem;
}

.total {
  padding-bottom: 0.5rem;
}
</style>