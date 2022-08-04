<script setup>
import { currencyFormat } from '@/utils/currencyFormat.ts';

import bgImage from '@/assets/img/bg-full.jpeg';
import Navbar from '@/Components/Navbar.vue';

defineProps(['semuaTransaksi']);
</script>

<template>
  <div class="wrapper"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <Navbar class="sidebar" />
    <div class="main">
      <h2 class="title">Daftar Transaksi</h2>
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
              <td>{{ transaksi.waktu_dibuat }}</td>
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
      
      <!-- <div class="py-3">
        <h2 class="title">Daftar Transaksi</h2>
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
                  <td>{{ transaksi.created_at }}</td>
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
      </div> -->
    </div>
  </div>
</template>

<style scoped lang="scss">

</style>