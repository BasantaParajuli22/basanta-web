document.addEventListener('DOMContentLoaded', function() {
    const cryptoPriceElement1 = document.getElementById('crypto-price1');//getting from index.html
    const cryptoPriceElement2 = document.getElementById('crypto-price2');
    const cryptoPriceElement3 = document.getElementById('crypto-price3');
    const marketcapElement = document.getElementById('marketcap-price');

    async function fetchCryptoPrice() {
        try {
            let response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,okb&vs_currencies=usd');
            //no response network error
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            
            let data = await response.json();
            const bitcoinprice = data.bitcoin.usd;
            const ethprice = data.ethereum.usd;
            const okbprice = data.okb.usd;
            
            // Extract and format the prices
            const formattedPrice1 = `$${bitcoinprice.toLocaleString()}`;
            const formattedPrice2 = `$${ethprice.toLocaleString()}`;
            const formattedPrice3 = `$${okbprice.toLocaleString()}`;

            // new vlaues which overlaps Loading..with them
            cryptoPriceElement1.textContent = formattedPrice1;
            cryptoPriceElement2.textContent = formattedPrice2;
            cryptoPriceElement3.textContent = formattedPrice3;
        } catch (error) {
            console.error('Error fetching the crypto price:', error);
            cryptoPriceElement1.textContent = 'Error fetching price1';
            cryptoPriceElement2.textContent = 'Error fetching price2';
            cryptoPriceElement3.textContent = 'Error fetching price3';

        }
    }
        async function fetchmarketcap(){
            try{
                let marketresponse = await fetch("https://api.coingecko.com/api/v3/global");

                if(!marketresponse.ok){
                    throw new Error(" Network Error :Market cap not responsed");
                }
                let marketcapdata = await marketresponse.json();
                const marketcap =  marketcapdata.data.total_market_cap.usd;

                const marketcapFormatted = `$${marketcap.toLocaleString()}`;

                marketcapElement.textContent = marketcapFormatted;
            }catch(error){
                console.log("Error at marketcap price",error);
                marketcapElement.textContent = "Error fetching marketcap price";
            }
        }
    // Initial fetch
    fetchCryptoPrice();
    fetchmarketcap();

    setInterval(fetchCryptoPrice, 10000);// Fetch the price every 10 seconds
    setInterval(fetchmarketcap,100000);// Fetch the price every 100 seconds
});
