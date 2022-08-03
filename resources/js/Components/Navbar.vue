<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { Icon } from '@iconify/vue';
import logo from '@/assets/img/logo.png';
</script>

<template>
  <aside class="sidebar d-flex flex-column flex-shrink-0 bg-secondary">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <Link href="#" class="d-block py-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
          <img :src="logo" alt="Logo" class="nav-logo" width="65">
          <span class="visually-hidden">Icon-only</span>
        </Link>
      </li>
      <li class="nav-item">
        <Link href="/" class="nav-link py-3 active rounded-0" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
          <Icon icon="ion:home" class="nav-icon" />
          Home
        </Link>
      </li>
      <li class="nav-item">
        <Link href="/layanan" class="nav-link py-3 rounded-0" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
          <Icon icon="ion:cart" class="nav-icon" />
          Layanan
        </Link>
      </li>
      <li class="nav-item">
        <Link href="/transaksi" class="nav-link py-3 rounded-0" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
          <Icon icon="ion:list-circle" class="nav-icon" />
          Transaksi
        </Link>
      </li>
      <li class="nav-item">
        <Link href="/pelanggan" class="nav-link py-3 rounded-0" title="Products" data-bs-toggle="tooltip" data-bs-placement="right">
          <Icon icon="ion:people" class="nav-icon" />
          Pelanggan
        </Link>
      </li>
    </ul>

    <a @click="useForm().post('/logout')"
      href="#" 
      class="nav-link py-4 rounded-0 text-primary" 
      title="Logout" 
      data-bs-toggle="tooltip" 
      data-bs-placement="right"
    >
      <Icon icon="ion:log-out" class="nav-icon" />
      Log Out
    </a>
  </aside>
</template>

<style scoped lang="scss">
.sidebar {
  font-size: 0.6rem;
}

.nav-link {
  display: flex;
  flex-direction: column;
  align-items: center;

  .nav-icon {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
  }
}

.nav-logo {
  font-size: 1.5rem;
}

@media only screen and (min-width: 600px) {
  .sidebar {
    font-size: 0.7rem;
  }
}

@media only screen and (min-width: 768px) {
  .sidebar {
    font-size: 0.8rem;
  }
  .nav-icon {
    font-size: 1.8rem;
  }

  .nav-logo {
    font-size: 2rem;
  }
}

</style>