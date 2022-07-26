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
      <UserCard name="Joko Susanto" position="Cashier" />
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
    gap: 10px;
  }
}

.side-content {
  width: 30%;
  padding: 0.5rem;
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