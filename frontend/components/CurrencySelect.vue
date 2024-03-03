<script lang="js" setup>
const props = defineProps({
  'selectName': {
    type: String,
    default: 'currency-select'
  },
  'label': {
    type: String,
    default: 'From Currency'
  },
  'currencies': {
    type: Array,
    default: () => ['USD', 'ZAR', 'EUR']
  }
});
</script>

<template>
  <div>
    <label
      class="p-2 text-md md:text-sm lg:text-lg font-bold inline-block self-stretch md:self-auto"
      for="from-currency"
    >
      {{ props.label }}
    </label>

    <select
      id="{{ props.selectName }}"
      class="w-full h-14 md:h-10 md:w-20 p-2 rounded-lg bg-amber-50 border-amber-200 border-2 md:self-center"
      name="from-currency"
    >
      <option
        v-for="currency in props.currencies"
        :key="currency"
        :value="currency"
      >
        {{ currency }}
      </option>
    </select>
  </div>
</template>


