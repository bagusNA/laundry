<script setup>
import BaseLayout from '@/Components/layouts/BaseLayout.vue';
import CheckoutDetailCard from '@/Components/layouts/CheckoutDetailCard.vue';

defineProps(['transaksi']);
</script>

<template>
  <BaseLayout>
    <template #title>Detail Transaksi</template>
    <template #content>
      <CheckoutDetailCard title="Data Pelanggan" icon="ion:person">
        <div class="d-flex justify-content-center pb-3">
          <span class="flex-grow-1 d-flex flex-column justify-content-center  gap-2">
            <h2>{{ transaksi.pelanggan.nama }}</h2>
            <h5>{{ transaksi.pelanggan.no_hp }}</h5>
          </span>
          <p class="w-50 flex-center">{{ transaksi.pelanggan.alamat }}</p>
        </div>
      </CheckoutDetailCard>
    </template>
    <template #side-title>Detail Transaksi</template>
    <template #side-content>Detail Transaksi</template>
  </BaseLayout>
</template>

<style scoped lang="scss">
</style>