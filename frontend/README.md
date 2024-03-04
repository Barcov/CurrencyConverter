# Exchangly - Exchange Rate Calculator

## Setup

## Clone the repository

If you haven't already, clone the repository:

```bash
git clone https://github.com/Barcov/CurrencyConverter.git
cd CurrencyConverter/frontend
```

Make sure to install the dependencies:

```bash
# npm
npm install
```

## Development Server

Start the development server on `http://localhost:3000`:

```bash
# npm
npm run dev
```

Locally preview production build:

```bash
# npm
npm run preview

```

Check out the [NuxtJS deployment documentation](https://nuxt.com/docs/getting-started/deployment) for more information.

## Usage

Ensure you've started the API server based on Laravel. See README.md in the `api` directory.
The Frontend currently assumes your API server is running on `http://localhost:8000`.

### Default view

When you visit the app you'll see the USD/ZAR exchange rate by default.

![](/home/barco/Documents/dev/interviews/ExchangeTracker/frontend/documentations/app.png)

### Update exchange rates

You can refresh the page or click the refresh button to update the exchange rates.

![](/home/barco/Documents/dev/interviews/ExchangeTracker/frontend/documentations/refresh.png)

Exchange rates will update based on your cache settings in the API `.env` file. By default each request will get
fresh results from backend. See the API documentation in 'api' for more information.

### Select currenciesYou can select a base currency and a target currency.

![](/home/barco/Documents/dev/interviews/ExchangeTracker/frontend/documentations/select-from-currency.png)

Updated exchange rate between the two currencies will be displayed.
![](/home/barco/Documents/dev/interviews/ExchangeTracker/frontend/documentations/eurusd.png)

### Invert currencies

Sometimes you may select from and to currencies in the wrong oder. You can invert the currencies by clicking on the
invert button.

![](/home/barco/Documents/dev/interviews/ExchangeTracker/frontend/documentations/invert-button.png)

The app will then display the exchange rate between the two currencies in the opposite direction.
![](/home/barco/Documents/dev/interviews/ExchangeTracker/frontend/documentations/inverted-results.png)
