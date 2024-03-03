<script lang="js" setup>
const props = defineProps({
  'fromCurrency': {type: String, default: 'USD'},
  'toCurrency': {type: String, default: 'ZAR'},
});
</script>

<template>
  <header class="mb-4 md:mb-7">
    <h2 class="text-3xl md:text-4xl font-light leading-8 mb-3">
      <slot name="title" />
    </h2>
    <p class="text-sm md:text-base font-medium lg:font-medium text-gray-950">
      {{ props.fromCurrency }}/{{ props.toCurrency }}
    </p>
  </header>
</template>
