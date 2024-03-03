<script lang="js" setup>
const store = useStore();
</script>

<template>
  <header class="mb-4 md:mb-7">
    <div class="flex justify-between">
      <div>
        <h2 class="text-3xl md:text-4xl font-light leading-8 mb-3">
          <slot />
        </h2>

        <p class="text-sm md:text-base font-medium lg:font-medium text-gray-950">
          {{ store.fromCurrency }}/{{ store.toCurrency }}
        </p>
      </div>

      <ApiRefreshButton />
    </div>
  </header>
</template>
