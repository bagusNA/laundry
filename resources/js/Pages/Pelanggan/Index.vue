<script setup>
import BaseLayout from '@/Components/layouts/BaseLayout.vue';
import CheckoutDetailCard from '@/Components/layouts/CheckoutDetailCard.vue';

defineProps(['pelangganList']);
</script>

<template>
  <BaseLayout>
    <template #title>Pelanggan</template>
    <template #content>
      <div class="content-wrapper">
        <CheckoutDetailCard title="Cari Pelanggan" icon="ion:search">
          <div class="search-wrapper">
            WIP
          </div>
        </CheckoutDetailCard>
        <CheckoutDetailCard title="Daftar Pelanggan" icon="ion:people">
          <table class="table text-light">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">No. HP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(pelanggan, index) in pelangganList">
                <th scope="row">{{ pelangganList.length - index }}</th>
                <td>{{ pelanggan.nama }}</td>
                <td>{{ pelanggan.no_hp }}</td>
                <td>{{ pelanggan.alamat }}</td>
                <td>
                  <button type="button" class="btn btn-secondary">Detail</button>
                </td>
              </tr>
            </tbody>
          </table>
        </CheckoutDetailCard>
      </div>
    </template>
    <template #side-title>WIP</template>
    <template #side-content>WIP</template>
  </BaseLayout>
</template>

<style scoped lang="scss">
.content-wrapper {
  display: flex;
  flex-direction: column;
  gap: 1.5rem 0;
}

.search-wrapper {
  padding-bottom: 0.5rem;
}
</style>