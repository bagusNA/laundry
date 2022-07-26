<script setup>
import Navbar from '@/Components/Navbar.vue';
import Category from '@/Components/Category.vue';
import UserCard from '@/Components/UserCard.vue';

</script>

<template>
  <div class="wrapper">
    <Navbar class="sidebar"/>
    <main class="main">
      <h2 class="title">Daftar Layanan</h2>
      <div class="kategori">
        <Category v-for="n in 5" />
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

  .kategori {
    // display: grid;
    // grid-template-columns: repeat(1, 100px);
    display: flex;
    gap: 0 10px;
  }
}

.side-content {
  width: 30%;
  padding: 0.5rem;
  background-color: salmon;
}

@media only screen and (min-width: 768px) {
  .sidebar {
    min-width: 6rem;
  }
}
</style>