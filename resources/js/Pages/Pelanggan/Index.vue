<script setup>
import { reactive } from 'vue';
import { useForm, Link } from '@inertiajs/inertia-vue3';
import BaseLayout from '@/Components/layouts/BaseLayout.vue';
import CheckoutDetailCard from '@/Components/layouts/CheckoutDetailCard.vue';
import Modal from '@/Components/layouts/Modal.vue';

defineProps(['pelangganList']);

const search = useForm({ q: '' });
const searchAction = () => {
  search.get('/pelanggan', {
    only: ['pelangganList'],
    preserveState: true,
  })
};

const showModal = reactive({
  tambahPelanggan: false
});
</script>

<template>
  <BaseLayout>
    <template #title>Pelanggan</template>
    <template #content>
      <div class="content-wrapper">
        <CheckoutDetailCard title="Daftar Pelanggan" icon="ion:people">
          <form @submit.prevent="searchAction" class="search-wrapper">
            <div class="input-group mb-3">
              <input name="q"
                v-model="search.q"
                type="text" 
                class="form-control" 
                placeholder="Cari pelanggan" 
                aria-label="Cari pelanggan" 
                aria-describedby="btn-search"
              >
              <button class="btn btn-secondary" type="button" id="btn-search">Cari</button>
            </div>
          </form>

          <table class="table text-light">
            <thead>
              <tr>
                <!-- <th scope="col">No.</th> -->
                <th scope="col">Id</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">No. HP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(pelanggan, index) in pelangganList">
                <!-- <th scope="row">{{ pelangganList.length - index }}</th> -->
                <th scope="row">{{ pelanggan.id }}</th>
                <td>{{ pelanggan.nama }}</td>
                <td>{{ pelanggan.no_hp }}</td>
                <td>{{ pelanggan.alamat }}</td>
                <td>
                  <Link :href="`/pelanggan/detail/${pelanggan.id}`"
                    class="btn btn-secondary"
                  >
                    Detail
                  </Link>
                </td>
              </tr>
            </tbody>
          </table>
        </CheckoutDetailCard>
      </div>
    </template>
    <template #side-title>Pilihan</template>
    <template #side-content>
      <button class="btn btn-primary"
        @click="showModal.tambahPelanggan = true"
      >
        Tambah
      </button>
      <button class="btn btn-primary"
        @click="showModal.tambahPelanggan = true"
      >
        Edit
      </button>
      <button class="btn btn-primary"
        @click="showModal.tambahPelanggan = true"
      >
        Terbaru
      </button>
    </template>
  </BaseLayout>

  <Modal :show="showModal.tambahPelanggan">
    <template #header>
      <h4>Tambah Pelanggan</h4>
    </template>
    <template #body>
      WIP
    </template>
    <template #footer>
      Close di sini
      <button class="btn btn-primary"
        @click="showModal.tambahPelanggan = false">
        Tambah
      </button>
    </template>
  </Modal>
</template>

<style scoped lang="scss">
.content-wrapper {
  display: flex;
  flex-direction: column;
  gap: 1.5rem 0;
}

.search-wrapper {
  padding-top: 0.5rem;
}
</style>