<script setup>
import bgImage from '@/assets/img/bg-full.jpeg';
import Navbar from '../../Components/Navbar.vue';
</script>

<template>
  <div class="wrapper"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <Navbar class="sidebar" />
    <div class="main">
      <h2 class="title">Daftar Transaksi</h2>
      <div class="p-2 rounded bg-primary text-light">
        <!-- <button type="button" class="btn btn-secondary">Uh</button> -->

        <table class="table text-light">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Tanggal Pesan</th>
              <th scope="col">Status</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>
                <button type="button" class="btn btn-success">Selesai</button>
                <button type="button" class="btn btn-secondary">Detail</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">

</style>