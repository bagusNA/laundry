<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Icon } from '@iconify/vue';
import { currencyFormat } from '../../utils/currencyFormat';

import UserCard from '@/Components/UserCard.vue';
import CheckoutDetailCard from '../../Components/layouts/CheckoutDetailCard.vue';
import bgImage from '@/assets/img/bg-full.jpeg';
import { reactive } from 'vue';
import PelangganModal from '@/Components/PelangganModal.vue';

defineProps(['data']);

const pelanggan = reactive({});
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
            <div v-if="!pelanggan.id" 
              class="pelanggan--kosong"
            >
              <h6>Pilih pelanggan terlebih dahulu.</h6>
              <button class="btn btn-success"
                data-bs-toggle="modal" 
                data-bs-target="#modalPelanggan"
              >
                Pilih pelanggan
              </button>
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
              <tr v-for="(bill, index) in data.billList">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ bill.nama }}</td>
                <td>{{ bill.qty }} {{ bill.satuan }}</td>
                <td>{{ currencyFormat((bill.harga * bill.qty)) }}</td>
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

    <!-- <template v-show="modalActive"> -->
      <PelangganModal />
    <!-- </template> -->
  </div>
</template>

<style scoped lang="scss">
.main {
  flex: 1;
  padding: 1rem 1.5rem;
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
  display: flex;
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

@media only screen and (min-width: 768px) {
  .sidebar {
    min-width: 6rem;
  }
  
  .main {
    padding: 1.5rem 2rem;

    .service-list {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
  }
}
</style>