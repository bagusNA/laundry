<script setup>
import { currencyFormat } from '@/utils/currencyFormat.ts';
import { dateFormat } from '@/utils/dateFormat.ts';
import BaseLayout from '@/Components/layouts/BaseLayout.vue';

defineProps(['semuaTransaksi']);
</script>

<template>
  <BaseLayout>
    <template #title>Transaksi</template>
    <template #content>
      <div class="p-2 rounded bg-primary text-light">
        <table class="table text-light">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">Tanggal Pesan</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Status</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(transaksi, index) in semuaTransaksi">
              <th scope="row">{{ semuaTransaksi.length - index }}</th>
              <td>{{ transaksi.pelanggan.nama }}</td>
              <td>{{ dateFormat(transaksi.waktu_dibuat ) }}</td>
              <td>{{ currencyFormat(transaksi.total_harga) }}</td>
              <td>{{ transaksi.status_selesai ? 'Selesai' : 'Dalam Proses' }}</td>
              <td>
                <button type="button" class="btn btn-success">Selesai</button>
                <button type="button" class="btn btn-secondary">Detail</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
  </BaseLayout>
</template>

<style scoped lang="scss">

</style>