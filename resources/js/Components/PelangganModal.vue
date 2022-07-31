<script setup>
import { Icon } from '@iconify/vue';

defineProps([
  'pelangganList',
  'searchQuery',
  'searchAction'
]);
defineEmits(['update:searchQuery']);
</script>

<template>
  <div class="modal fade" id="modalPelanggan" tabindex="-1" aria-labelledby="modalPelangganLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPelangganLabel">Pilih Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-pills nav-fill pb-3" id="tab-pelanggan" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link flex-center active" id="tab-pelanggan-lama" data-bs-toggle="tab" data-bs-target="#lama" type="button" role="tab" aria-controls="lama" aria-selected="true">
                <span class="flex-center px-2">
                  <Icon icon="ic:baseline-history" />
                </span>
                Lama
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link flex-center" id="tab-pelanggan-baru" data-bs-toggle="tab" data-bs-target="#baru" type="button" role="tab" aria-controls="baru" aria-selected="false">
                <span class="flex-center px-2">
                  <Icon icon="ion:person-add" />
                </span>
                Baru
              </button>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="lama" role="tabpanel" aria-labelledby="tab-pelanggan-lama" tabindex="0">
              <form @submit.prevent="searchAction">
                <div class="input-group mb-2">
                  <input 
                    :value="searchQuery"
                    @input="$emit('update:searchQuery', $event.target.value)"
                    class="form-control" 
                    type="text" 
                    placeholder="Nama pelanggan" 
                    aria-label="Nama pelanggan" 
                    aria-describedby="search-button"
                  >
                  <button class="btn btn-outline-secondary" type="submit" id="search-button">Search</button>
                </div>
              </form>

              <div class="card">
                <ul class="list-group list-group-flush">
                  <li v-for="pelanggan in pelangganList" 
                    class="list-group-item d-flex justify-content-between align-items-center"
                  >
                    <div class="d-flex flex-column flex-grow-1">
                      {{ pelanggan.nama }}
                      <span class="alamat">{{ pelanggan.alamat }}</span>
                    </div>
                    <span class="px-3">{{ pelanggan.no_hp }}</span>
                    <button class="btn btn-primary">Pilih</button>
                  </li>
                </ul>
              </div>
            </div>
            <div class="tab-pane" id="baru" role="tabpanel" aria-labelledby="tab-pelanggan-baru" tabindex="0">
              <form @submit.prevent="">
                <div class="mb-3">
                  <label for="nama-lengkap" class="form-label">Nama lengkap</label>
                  <input type="text" class="form-control" id="nama-lengkap" placeholder="Nama lengkap">
                </div>
                <div class="mb-3">
                  <label for="no-hp" class="form-label">No. HP</label>
                  <input type="text" class="form-control" id="nama-lengkap" placeholder="08123456789">
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea class="form-control" id="alamat" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>

<style scoped lang="scss">
.modal-body {
  min-height: 20rem;
}

.card {
  max-height: 20rem;
  overflow: auto;
}

.alamat {
  font-size: 0.85rem;
}
</style>