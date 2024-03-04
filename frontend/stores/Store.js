import {defineStore} from 'pinia';

export let useStore = defineStore('exchangeRates', {
    state() {
        return {
            fromCurrency: 'USD',
            toCurrency: 'ZAR',
            exchangeRate: 0,
            inverseExchangeRate: 0,
            apiUpdating: true,
            currencies: {
                "USD": {"name": "US Dollar", "flagIcon": "us"},
                "ZAR": {"name": "South African Rand", "flagIcon": "za"},
                "EUR": {"name": "Euro", 'flagIcon': "eu"},
            },

            exchangeRates: [],
        }
    },

    actions: {
        switchToAndFromCurrencies() {
            const temp = this.fromCurrency;
            this.fromCurrency = this.toCurrency;
            this.toCurrency = temp;

            this.updateExchangeRate();
            this.updateInverseExchangeRate();
        },

        roundToTwoDecimals(num) {
            return num.toFixed(2)
        },

        updateExchangeRate() {
            console.log('UpdateExchangeRate')
            if (this.fromCurrency === 'EUR') {
                this.exchangeRate = this.roundToTwoDecimals(this.exchangeRates[0].values[this.toCurrency]);

            }
            const euroRate = this.exchangeRates[0].values['EUR'],
                fromCurrencyRate = this.exchangeRates[0].values[this.fromCurrency],
                toCurrencyRate = this.exchangeRates[0].values[this.toCurrency];

            this.exchangeRate = this.roundToTwoDecimals(euroRate * toCurrencyRate / fromCurrencyRate)
        },

        updateInverseExchangeRate() {
            console.log('UpdateInverseRates')
            if (this.toCurrency === 'EUR') {
                this.inverseExchangeRate = this.roundToTwoDecimals(this.exchangeRates[0].values[this.toCurrency]);
            }

            const euroRate = this.exchangeRates[0].values['EUR'],
                fromCurrencyRate = this.exchangeRates[0].values[this.fromCurrency],
                toCurrencyRate = this.exchangeRates[0].values[this.toCurrency];

            this.inverseExchangeRate = this.roundToTwoDecimals(euroRate * fromCurrencyRate / toCurrencyRate);
        },

        setFromCurrency(value) {
            this.fromCurrency = value;
            console.log('new rate: ' + this.exchangeRate)
            this.updateExchangeRate();
            this.updateInverseExchangeRate();
            console.log('new rate: ' + this.exchangeRate)
        },

        setToCurrency(value) {
            this.toCurrency = value
            this.updateExchangeRate();
            this.updateInverseExchangeRate();
        },

        apiFrontEndUpdate(json) {
            this.exchangeRates = json;
            this.updateExchangeRate();
            this.updateInverseExchangeRate();
        },
    },

    getters: {
        getCurrencies(state) {
            return Object.keys(state.currencies);
        },
    },

});
