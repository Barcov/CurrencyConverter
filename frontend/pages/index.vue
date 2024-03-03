<script lang="ts" setup>
useHead({
  bodyAttrs: {
    class: 'h-full grid place-content-center mt-5 md:mt-10',
    //
  }
});

const currencies = ['USD', 'ZAR', 'EUR'];
</script>

<template>
  <div class="bg-white m-h-[600px] w-[90vw] md:w-[70vw] xl:w-[800px] rounded-2xl shadow-2xl p-5 pb-6">
    <header class="mb-4 md:mb-7">
      <h2 class="text-3xl md:text-4xl font-extralight leading-8 mb-3">
        Live currency rates
      </h2>
      <p class="text-sm md:text-base font-medium lg:font-medium text-gray-950">
        ZAR/USD
      </p>
    </header>

    <section>
      <div>
        <div class="grid grid-rows-4 grid-flow-col gap-1 p-2 mb-4 bg-amber-100 rounded md:my-4">
          <div class="col-span-2 md:col-span-1 row-span-2 md:row-span-4 md:justify-self-start md:self-center">
            <label
              class="p-2 text-md md:text-sm lg:text-lg font-bold inline-block self-stretch md:self-auto"
              for="from-currency"
            >
              From Currency
            </label>

            <select
              id="from-currency"
              class="w-full md:w-20 h-14 md:h-10 lg:h-16 p-2 rounded-lg bg-amber-50 border-amber-200 border-2 md:self-center"
              name="from-currency"
            >
              <option
                v-for="currency in currencies"
                :key="currency"
                :value="currency"
              >
                {{ currency }}
              </option>
            </select>
          </div>

          <div class="row-span-4 col-start-1 md:col-start-2 md:col-span-1 justify-self-center self-center">
            <button
              class="bg-amber-400 hover:bg-amber-300 text-white font-bold md:py-2 px-3 md:px-4 md:my-4 rounded-xl md:rounded drop-shadow-2xl w-20 md:w-15 lg:w-32 h-20 md:h-10 lg:h-15"
              @click="$emit('click')"
            >
              <svg
                class="w-15 md:h-5 h-15 md:w-5 mx-auto stroke-[1.8] stroke-black fill-none"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M18 10L21 7M21 7L18 4M21 7H7M6 14L3 17M3 17L6 20M3 17H17"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </div>

          <div class="row-span-2 md:row-span-4 col-span-2 md:col-span-1 md:justify-self-end md:self-center">
            <label
              class="p-2 text-md md:text-sm lg:text-lg font-bold inline-block self-stretch md:self-center"
              for="from-currency"
            >
              To Currency
            </label>

            <select
              id="to-currency"
              class="w-full md:w-20 h-14 md:h-10 lg:h-16 p-2 rounded-lg bg-amber-50 border-amber-200 border-2 md:self-center"
              name="to-currency"
            >
              <option
                v-for="currency in currencies"
                :key="currency"
                :value="currency"
              >
                {{ currency }}
              </option>
            </select>
          </div>
        </div>
        <div class="bg-gray-200 rounded p-3">
          <div class="text-l md:text-xl font-bold text-gray-800 pb-1">
            1.00 US Dollar =
          </div>

          <div class="text-3xl md:text-4xl font-light text-gray-950 pb-2 md:pb-3">
            19.00 South African Rand
          </div>

          <div class="text-base md:text-l text-amber-600 font-bold">
            1 USD = 1.08 ZAR
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
