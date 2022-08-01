<script setup>
import { reactive, ref } from 'vue';
import { computed } from '@vue/reactivity';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { Icon } from '@iconify/vue';
import { store } from '@/store';
import { currencyFormat } from '../../utils/currencyFormat';

import UserCard from '@/Components/UserCard.vue';
import CheckoutDetailCard from '../../Components/layouts/CheckoutDetailCard.vue';
import bgImage from '@/assets/img/bg-full.jpeg';

const props = defineProps(['data', 'pelangganList', 'pelanggan']);

const pelanggan = computed(() => props.pelanggan);
const pelangganList = computed(() => props.pelangganList);

const createPesanan = useForm({
  list: store.cart
});

const searchPelanggan = useForm({
  formName: 'searchPelanggan',
  query: ''
});
const searchAction = () => {
  searchPelanggan.get('/checkout', {
    only: ['pelangganList'],
    preserveState: true
  });
};

const createPelanggan = useForm({
  nama: null,
  no_hp: null,
  alamat: null,
});
const createAction = () => {
  createPelanggan.post('/pelanggan/create', {
    only: ['pelanggan'],
    preserveState: true,
    resetOnSuccess: false
  });
}
</script>

<template>
  <div class="wrapper"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <div class="main">
      <div class="main__header">
        <Link href="/layanan"
          as="button"
          type="button" 
          class="btn btn-primary btn-lg"
        >
          <Icon icon="ion:arrow-back" />
        </Link>
        <span class="main__title">Checkout</span>
      </div>
      <div class="main__content">
        <CheckoutDetailCard title="Pelanggan" icon="ion:person">
          <div class="pelanggan-wrapper">
            <ul class="nav nav-pills nav-fill pb-3" id="tab-pelanggan" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link flex-center active" id="tab-pelanggan-lama" data-bs-toggle="tab" data-bs-target="#content-pelanggan-lama" type="button" role="tab" aria-controls="content-pelanggan-lama" aria-selected="true">
                  <span class="flex-center px-2">
                    <Icon icon="ic:baseline-history" />
                  </span>
                  Lama
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link flex-center" id="tab-pelanggan-baru" data-bs-toggle="tab" data-bs-target="#content-pelanggan-baru" type="button" role="tab" aria-controls="content-pelanggan-baru" aria-selected="false">
                  <span class="flex-center px-2">
                    <Icon icon="ion:person-add" />
                  </span>
                  Baru
                </button>
              </li>
            </ul>

            <div class="tab-content pb-2">
              <div class="tab-pane active" id="content-pelanggan-lama" role="tabpanel" aria-labelledby="tab-pelanggan-lama" tabindex="0">
                <form @submit.prevent="searchAction">
                  <div class="input-group mb-2">
                    <input 
                      v-model="searchPelanggan.query"
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
                    <li v-if="pelangganList.length" 
                      v-for="pelanggan in pelangganList" 
                      class="list-group-item d-flex justify-content-between align-items-center"
                    >
                      <div class="d-flex flex-column flex-grow-1">
                        {{ pelanggan.nama }}
                        <span class="alamat">{{ pelanggan.alamat }}</span>
                      </div>
                      <span class="px-3">{{ pelanggan.no_hp }}</span>
                      <button class="btn btn-primary">Pilih</button>
                    </li>
                    <li v-else
                      class="list-group-item d-flex justify-content-center align-items-center"
                    >
                      <span class="flex-center px-2">
                        <Icon icon="ion:alert-circle" />
                      </span>
                      Data pelanggan tidak ditemukan!
                    </li>
                  </ul>
                </div>
              </div>
              <div class="tab-pane" id="content-pelanggan-baru" role="tabpanel" aria-labelledby="tab-pelanggan-baru" tabindex="0">
                <form @submit.prevent="createAction">
                  <div class="mb-3">
                    <label for="nama-lengkap" class="form-label">Nama lengkap</label>
                    <input v-model="createPelanggan.nama"
                      type="text" 
                      class="form-control"
                      id="nama-lengkap" 
                      placeholder="Nama lengkap"
                    >
                  </div>
                  <div class="mb-3">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input v-model="createPelanggan.no_hp"
                      type="text" 
                      class="form-control" 
                      id="nama-lengkap" 
                      placeholder="08123456789">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea v-model="createPelanggan.alamat"
                      class="form-control" 
                      id="alamat" 
                      rows="3"></textarea>
                  </div>
                  <div class="d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Tambahkan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </CheckoutDetailCard>

        <CheckoutDetailCard title="Detail Pesanan" icon="ion:list-circle">
          <table class="table text-light">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Layanan</th>
                <th scope="col">Qty</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in store.cart">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ item.nama }}</td>
                <td>{{ item.qty }} {{ item.satuan }}</td>
                <td>{{ currencyFormat((item.harga * item.qty)) }}</td>
              </tr>
            </tbody>
          </table>
        </CheckoutDetailCard>
      </div>
    </div>
    <aside class="side-content">
      <div class="side-content__user-wrapper">
        <UserCard name="Joko Susanto" position="Cashier" />
      </div>
      <div class="bill bg-secondary">
        <span class="bill__title">Summary</span>
        <div class="bill__content">
          <div v-if="pelanggan">
            <p>{{ pelanggan.id }}</p>
            <p>{{ pelanggan.nama }}</p>
            <p>{{ pelanggan.no_hp }}</p>
            <p>{{ pelanggan.alamat }}</p>
          </div>
        </div>

        <!-- <div class="bill__total-wrapper">
          Total: <span class="bill__total">{{ }}</span>
        </div> -->
        <div
          class="bill__next-btn bg-primary text-light"
          @click=""
        >
          Simpan
        </div>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss">
$primary: #21405C;
$secondary: #FFFFFF;

.main {
  flex: 1;
  padding: 0.75rem 1rem;
  height: 100vh;
  overflow: auto;

  &__header {
    display: flex;
    align-items: center;
    gap: 0 1.5rem;
    padding-bottom: 1.2rem;
  }

  &__title {
    font-size: 2rem;
  }

  &__content {
    display: flex;
    flex-direction: column;
    gap: 1.5rem 0;
  }
}

.side-content {
  width: 35%;
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

  &__total-wrapper {
    display: flex;
    justify-content: space-between;
    font-size: 1.5rem;
    padding-bottom: 0.75rem;
  }

  &__total {
    font-weight: bold;
  }

  &__next-btn {
    padding: 1.5rem 1rem;
    border-radius: 10px;
    font-size: 1.5rem;
    text-align: center;
    transition: 100ms;

    &:hover {
      cursor: pointer;
      opacity: 0.9;
    }
  }
}

.pelanggan-wrapper {
  min-height: 100px;
  padding: 0.5rem;
}

.pelanggan {
  flex-grow: 1;

  &--kosong {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
  }
}

.card {
  max-height: 20rem;
  overflow: auto;
}

// Change nav-pills color
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
  color: $primary;
  background-color: $secondary;
}

.nav-pills .nav-link, .nav-pills > .nav-link {
  color: $secondary;
}

@media only screen and (min-width: 768px) {
  .main {
    padding: 1rem 1.25rem;
  }
}

@media only screen and (min-width: 1024px) {
  .main {
    padding: 1.25rem 1.75rem;
  }
}
</style>