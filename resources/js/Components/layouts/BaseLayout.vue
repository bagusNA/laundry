<script setup>
import Navbar from '@/Components/Navbar.vue';
import UserCard from '@/Components/UserCard.vue';
import bgImage from '@/assets/img/bg-full.jpeg';
</script>

<template>
  <div class="wrapper"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <Navbar class="sidebar"/>
    <main class="main">
      <h2 class="title">
        <slot name="title">Home</slot>
      </h2>
      <slot name="content">Content</slot>
    </main>
    <aside class="aside-wrapper">
      <div class="user-wrapper">
        <UserCard name="Joko Susanto" position="Cashier" />
      </div>
      <div class="aside bg-secondary">
        <span class="aside__title">
          <slot name="side-title">Action</slot>
        </span>
        <div class="aside__content">
          <slot name="side-content">Content</slot>
        </div>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss">
.main {
  flex: 1;
  padding: 1rem 1.5rem;
  height: 100vh;
  overflow: auto;

  .title {
    padding-bottom: 1.5rem;
  }
}

.aside-wrapper {
  width: 35%;
  padding-top: 0.5rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;

  .user-wrapper {
    padding-right: 1.5rem;
  }
}

.aside {
  flex-grow: 1;
  padding: 1rem 1rem;
  border-top-left-radius: 10px;
  display: flex;
  flex-direction: column;

  &__title {
    font-size: 1.5rem;
    padding-bottom: 0.5rem;
  }

  &__content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 2rem 0;
    // padding-bottom: 2rem;
  }
}

@media only screen and (min-width: 768px) {  
  .main {
    padding: 1.5rem 1.25rem;
  }
}

@media only screen and (min-width: 1024px) {
  .aside-wrapper {
    width: 30%;
  }
}

@media only screen and (min-width: 1280px) {
  .aside-wrapper {
    width: 25%;
  }
}
</style>