<script setup>
defineProps(['show', 'width']);
</script>

<template>
  <Transition name="modal">
    <div v-if="show" class="modal__mask">
      <div class="modal__wrapper">
        <div class="modal__container">
          <div class="modal__header">
            <slot name="header">Header</slot>
          </div>

          <div class="modal__body">
            <slot name="body">Body</slot>
          </div>

          <div class="modal__footer">
            <slot name="footer">
              Footer
              <button
                class="modal__default-button"
                @click="$emit('close')"
              >OK</button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </Transition>
</template>

<style scoped lang="scss">
.modal {
  &__mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
  }

  &__wrapper {
    display: table-cell;
    vertical-align: middle;
  }

  &__container {
    max-width: 60rem;
    margin: 0px auto;
    padding: 1.25rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
  }

  &__header h3 {
    margin-top: 0;
    color: #42b983;
  }

  &__body {
    margin: 20px 0;
  }

  &__default-button {
    float: right;
  }

  &__footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
}

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal__container,
.modal-leave-to .modal__container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>