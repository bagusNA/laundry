<script setup>
import { Icon } from '@iconify/vue';
import bgImage from '@/assets/img/bg-full.jpeg'
</script>

<template>
  <div class="wrapper flex-center"
    :style="{ backgroundImage: `url('${bgImage}')`}"
  >
    <div class="login">
      <div class="input-icon">
        <div class="toggle-eye open">
          <ion-icon name="eye-outline"></ion-icon>
        </div>
        <div class="toggle-eye close">
          <ion-icon name="eye-off-outline"></ion-icon>
        </div>
        <ion-icon name="people-outline" class="input-icon1"></ion-icon>
        <ion-icon name="key-outline" class="input-icon2"></ion-icon>
      </div>
      <h2 class="login__title">LOGIN | LAUNDRY</h2>
      <form action="#" method="POST">
        <div class="input-group mb-3">
          <span class="input-group-text" id="password">
            <Icon icon="ion:user" />
          </span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="password">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="password">
            <Icon icon="ion:key" />
          </span>
          <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password">
        </div>
        <!-- <input type="text" name="user" placeholder="Username" class="input-control1">
        <input type="password" name="pass" placeholder="Password" class="input-control2"> -->
        <button type="submit" name="submit" class="login__btn">Submit</button>
      </form>
    </div>
  </div>
</template>

<style scoped lang="scss">
.login {
	width: 290px;
	min-height: 100px;
	border: 2px solid #ccc;
	background-color: #fff;
	padding: 28px;
	box-sizing: border-box;
  border-radius: 10px;

  &__title {
    text-align: center;
    margin-bottom: 15px;
  }

  &__btn {
    padding: 4px 10px;
    background-color:#4040ff ;
    color: #fff;
    cursor: pointer;
  }
}
</style>