<script setup>
import Navbar from '@/Components/Navbar.vue';
import Category from '@/Components/CategoryCard.vue';
import UserCard from '@/Components/UserCard.vue';
import ServiceCard from '@/Components/ServiceCard.vue';

function hi() {
  console.log('hi')
}

</script>

<template>
  <div class="wrapper">
    <Navbar class="sidebar"/>
    <main class="main">
      <h2 class="title">Daftar Layanan</h2>
      <div class="category-list">
        <Category v-for="n in 5" />
      </div>
      <div class="service-list">
        <ServiceCard v-for="n in 10"
          name="Reguler 3 Hari" 
          :price="5000"
          icon="ion:home"
          :onClick="hi"
        />
      </div>
    </main>
    <aside class="side-content">
      <div class="side-content__user-wrapper">
        <UserCard name="Joko Susanto" position="Cashier" />
      </div>
      <div class="bill bg-secondary bg-opacity-75">
        <span class="bill__title">Bill</span>
        <div class="bill__content">
          hi
        </div>
        <div
          class="bill__next-btn bg-primary text-light"
          @click="hi"
        >
          Selanjutnya
        </div>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss">
.wrapper {
  display: flex;
  min-height: 100vh;
}

.main {
  flex: 1;
  padding: 1rem 1.5rem;

  .title {
    padding-bottom: 1.5rem;
  }

  .category-list {
    display: flex;
    gap: 0 10px;
    padding-bottom: 1.5rem;
  }

  .service-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    justify-content: space-between;
    gap: 15px;
  }
}

.side-content {
  width: 30%;
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
    }

    &__content {
      flex-grow: 1;
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