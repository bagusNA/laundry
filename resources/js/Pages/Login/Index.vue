<script setup>
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Icon } from '@iconify/vue';
import bgImage from '@/assets/img/bg-full.jpeg';

const formData = reactive({
  username: null,
  password: null,
});

const submit = () => {
  Inertia.post('/login', formData);
};
</script>

<template>
  <div class="wrapper flex-center flex-column"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <div v-if="$page.props.flash.error" 
      class="alert alert-danger" 
      role="alert"
    >
    {{ $page.props.flash.error }} 
    </div>

    <div class="login border border-primary">
      <h2 class="login__title">LOGIN | LAUNDRY</h2>
      <form @submit.prevent="submit">
        <div class="input-group mb-3">
          <span class="input-group-text" id="password">
            <Icon icon="ion:person" />
          </span>
          <input v-model="formData.username"
            type="text" 
            class="form-control" 
            placeholder="Username" 
            aria-label="Username" 
            aria-describedby="password"
            required
          >
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="password">
            <Icon icon="ion:key" />
          </span>
          <input v-model="formData.password"
            type="password" 
            class="form-control" 
            placeholder="Password" 
            aria-label="Password" 
            aria-describedby="password"
            required
          >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</template>

<style scoped lang="scss">
.login {
	min-height: 100px;
	background-color: #fff;
	padding: 28px;
	box-sizing: border-box;
  border-radius: 10px;

  &__title {
    text-align: center;
    margin-bottom: 15px;
  }
}
</style>